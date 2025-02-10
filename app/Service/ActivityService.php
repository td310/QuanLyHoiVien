<?php

namespace App\Service;

use App\Models\Activity;
use App\Models\Committees;
use App\Models\CusCorporate;
use App\Models\PersonalCustomer;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;


class ActivityService
{
    public function getAllActivities($filters = [])
    {
        $query = Activity::query();

        if (!empty($filters['start_date'])) {
            $query->whereDate('date_start', '>=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $query->whereDate('date_end', '<=', $filters['end_date']);
        }
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('activity_name', 'like', "%{$filters['search']}%")
                    ->orWhere('description', 'like', "%{$filters['search']}%");
            });
        }

        return $query->orderBy('date_start', 'desc')->paginate(6);
    }
    public function createActivity($data)
    {
        DB::beginTransaction();
        $now = now();
        $status = $now->lt($data['date_start']) ? 'inactive' : 'active';

        $customerTypes = $data['customer_type'] === 'all'
            ? ['committee', 'corporate', 'personal', 'partner']
            : [$data['customer_type']];

        $activity = Activity::create([
            'activity_name' => $data['activity_name'],
            'location' => $data['location'],
            'description' => $data['description'],
            'date_start' => $data['date_start'],
            'date_end' => $data['date_end'],
            'customer_type' => $customerTypes,
            'status' => $status,
            'manual_name' => $data['manual_name'] ?? [],
            'manual_email' => $data['manual_email'] ?? []
        ]);

        if (isset($data['file'])) {
            $activity->addMediaFromRequest('file')
                ->toMediaCollection('activity_file');
        }

        DB::commit();
        return $activity;
    }

    public function getActivityById($id)
    {
        $activity = Activity::with('media')->findOrFail($id);
        return $activity;
    }

    public function getActivityCustomers($id)
    {
        $activity = Activity::findOrFail($id);
        $customerTypes = $activity->customer_type;
        $data = [];

        if (in_array('committee', $customerTypes)) {
            $data['committees'] = Committees::select('id_login', 'committee_name as name', 'email')->get();
        }
        if (in_array('corporate', $customerTypes)) {
            $data['corporates'] = CusCorporate::select('id_login', 'company_vn as name', 'email')->get();
        }
        if (in_array('personal', $customerTypes)) {
            $data['personals'] = PersonalCustomer::select('id_login', 'personal_customer_name as name', 'email')->get();
        }
        if (in_array('partner', $customerTypes)) {
            $data['partners'] = Partner::select('id_login', 'company_vn as name')->get();
        }

        $manualNames = array_filter($activity->manual_name ?? [], function ($value) {
            return !is_null($value);
        });
        $manualEmails = array_filter($activity->manual_email ?? [], function ($value) {
            return !is_null($value);
        });

        if (count($manualNames) > 0 && count($manualEmails) > 0) {
            $data['manual_recipients'] = array_map(function ($name, $email) {
                return [
                    'name' => $name,
                    'email' => $email
                ];
            }, $manualNames, $manualEmails);
        }

        $data['activity'] = $activity;
        return $data;
    }

    public function updateActivity($id, $data)
    {
        DB::beginTransaction();
        try {
            $activity = Activity::findOrFail($id);
            $now = now();

            $dateTime = \Carbon\Carbon::parse($data['date_start']);
            $status = $dateTime->format('Y-m-d H:i') === $now->format('Y-m-d H:i')
                ? 'active'
                : ($dateTime->gt($now) ? 'inactive' : 'active');

            $customerTypes = $data['customer_type'] === 'all'
                ? ['committee', 'corporate', 'personal', 'partner']
                : [$data['customer_type']];

            $activity->update([
                'activity_name' => $data['activity_name'],
                'location' => $data['location'],
                'description' => $data['description'],
                'date_start' => $data['date_start'],
                'date_end' => $data['date_end'],
                'customer_type' => $customerTypes,
                'status' => $status,
                'manual_name' => $data['manual_name'] ?? [],
                'manual_email' => $data['manual_email'] ?? []
            ]);

            if (isset($data['file'])) {
                $activity->clearMediaCollection('activity_file');
                $activity->addMediaFromRequest('file')
                    ->toMediaCollection('activity_file');
            }

            DB::commit();
            return $activity;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
