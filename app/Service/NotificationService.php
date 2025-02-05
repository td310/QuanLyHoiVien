<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Models\Committees;
use App\Models\CusCorporate;
use App\Models\PersonalCustomer;
use App\Models\Partner;

class NotificationService
{
    public function getAllNotifications($filters = [])
    {
        $query = DB::table('notifications')
            ->select(
                DB::raw('MAX(id) as id'),
                'title',
                'method',
                'date',
                'status',
                DB::raw("
                    SUM(
                        CASE 
                            WHEN customer_type = 'manual' AND manual_email IS NOT NULL THEN 1 
                            ELSE 0 
                        END
                    ) + COUNT(DISTINCT CASE WHEN customer_type IS NOT NULL AND customer_type <> 'manual' THEN customer_id END) as recipient_count
                ")
            )
            ->groupBy('title', 'method', 'date', 'status');
    
        if (!empty($filters['start_date'])) {
            $query->whereDate('date', '>=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $query->whereDate('date', '<=', $filters['end_date']);
        }
        if (!empty($filters['method'])) {
            $query->where('method', $filters['method']);
        }
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('method', 'like', "%{$search}%");
            });
        }
    
        return $query->orderBy('date', 'desc')
                     ->paginate(6);
    }
    

    public function getAllData()
    {
        $committees = Committees::select(
            'id',
            'id_login',
            'committee_name as name',
            'email'
        )->get();

        $corporates = CusCorporate::with(['field', 'market', 'targetCustomer'])
            ->select(
                'id',
                'id_login',
                'company_vn as name',
                'email',
                'size_company',
                'feild_id',
                'market_id',
                'target_customer_id'
            )->get();

        $personals = PersonalCustomer::with('field')
            ->select(
                'id',
                'id_login',
                'personal_customer_name as name',
                'email',
                'feild_id'
            )->get();

        $partners = Partner::select(
            'id',
            'id_login',
            'company_vn as name',
        )->get();

        return [
            'committees' => $committees,
            'corporates' => $corporates,
            'personals' => $personals,
            'partners' => $partners
        ];
    }

    public function createNotification($data)
    {
        $notifications = [];
        $now = now();

        if ($data['date'] === 'now') {
            $sendDate = $now->format('Y-m-d H:i:s');
            $status = 'active';
        } else {
            $sendDate = $data['date_custom'];
            $status = $now->lt($sendDate) ? 'inactive' : 'active';
        }

        if (!empty($data['selected'])) {
            foreach ($data['selected'] as $selectedValue) {
                $parts = explode('_', $selectedValue);
                if (count($parts) !== 2) {
                    continue;
                }

                [$customerType, $customerId] = $parts;

                if (!in_array($customerType, ['committee', 'corporate', 'personal', 'partner'])) {
                    continue;
                }

                $notifications[] = [
                    'title' => $data['title'],
                    'method' => $data['method'],
                    'date' => $sendDate,
                    'description' => $data['description'] ?? null,
                    'status' => $status,
                    'customer_type' => $customerType,
                    'customer_id' => $customerId,
                    'manual_email' => null,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }

        if (!empty($data['manual_email'])) {
            $notifications[] = [
                'title' => $data['title'],
                'method' => $data['method'],
                'date' => $sendDate,
                'description' => $data['description'] ?? null,
                'status' => $status,
                'customer_type' => 'manual',
                'customer_id' => 0,
                'manual_email' => $data['manual_email'],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        return DB::table('notifications')->insert($notifications);
    }

    public function getNotificationById($id)
    {
        $notification = DB::table('notifications')
            ->where('notifications.id', $id)
            ->first();

        $recipients = DB::table('notifications')
            ->where('notifications.title', $notification->title)
            ->where('notifications.date', $notification->date)
            ->get();

        $data = $this->getAllData();

        return [
            'notification' => $notification,
            'recipients' => $recipients,
            'committees' => $data['committees'],
            'corporates' => $data['corporates'],
            'personals' => $data['personals'],
            'partners' => $data['partners']
        ];
    }

    public function getNotificationRecipients($id)
    {
        return DB::table('notifications')
            ->where('id', $id)
            ->get();
    }

    public function updateNotification($id, $data)
    {
        DB::beginTransaction();
        try {
            $now = now();
            $originalNotification = DB::table('notifications')
                ->where('id', $id)
                ->first();
    
            if ($data['date'] === 'now') {
                $sendDate = $now->format('Y-m-d H:i:s');
                $status = 'active';
            } else {
                $sendDate = $data['date_custom'];
                $status = $now->lt($sendDate) ? 'inactive' : 'active';
            }
            DB::table('notifications')
                ->where('title', $originalNotification->title)
                ->where('date', $originalNotification->date)
                ->delete();
    
            $notifications = [];
            if (!empty($data['selected'])) {
                foreach ($data['selected'] as $selectedValue) {
                    list($type, $customerId) = explode('_', $selectedValue);
                    
                    $notifications[] = [
                        'title' => $data['title'],
                        'method' => $data['method'],
                        'date' => $sendDate,
                        'description' => $data['description'] ?? null,
                        'status' => $status,
                        'customer_type' => $type,
                        'customer_id' => $customerId,
                        'manual_email' => null,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
            }
    
            if (isset($data['manual_email_checkbox']) && !empty($data['manual_email'])) {
                $notifications[] = [
                    'title' => $data['title'],
                    'method' => $data['method'],
                    'date' => $sendDate,
                    'description' => $data['description'] ?? null,
                    'status' => $status,
                    'customer_type' => 'manual',
                    'customer_id' => 0, 
                    'manual_email' => $data['manual_email'],
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
    
            if (!empty($notifications)) {
                DB::table('notifications')->insert($notifications);
            }
    
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteNotification($id)
    {
        $notification = DB::table('notifications')->where('id', $id)->first();
    
        if ($notification) {
            return DB::table('notifications')
                ->where('title', $notification->title)
                ->where('method', $notification->method)
                ->where('date', $notification->date)
                ->delete();
        }
    
        return false;
    }
    
}
