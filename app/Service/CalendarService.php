<?php

namespace App\Service;

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;
use App\Models\Committees;
use App\Models\CusCorporate;
use App\Models\PersonalCustomer;
use App\Models\Partner;

class CalendarService
{
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

    public function createCalendar($data)
    {
        $now = now();
        $status = $now->lt($data['date']) ? 'inactive' : 'active';

        $customerLoginIds = [];
        foreach ($data['selected'] as $selectedValue) {
            list($type, $customerId) = explode('_', $selectedValue);

            switch ($type) {
                case 'committee':
                    $customer = Committees::find($customerId);
                    break;
                case 'corporate':
                    $customer = CusCorporate::find($customerId);
                    break;
                case 'personal':
                    $customer = PersonalCustomer::find($customerId);
                    break;
                case 'partner':
                    $customer = Partner::find($customerId);
                    break;
            }

            if ($customer) {
                $customerLoginIds[] = $customer->id_login;
            }
        }

        return Calendar::create([
            'host' => $data['host'],
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'location' => $data['location'],
            'date' => $data['date'],
            'status' => $status,
            'customer_login_id' => implode(',', $customerLoginIds),
            'manual_email' => $data['manual_email'] ?? null
        ]);
    }

    public function getEvents()
    {
        $events = Calendar::select('id', 'title', 'date', 'status')
            ->orderBy('date', 'desc')
            ->get();
    
        return $events->map(function($calendar) {
            return [
                'id' => $calendar->id,
                'title' => $calendar->title,
                'start' => date('Y-m-d\TH:i:s', strtotime($calendar->date)),
                'color' => $calendar->status === 'active' ? '#16C47F' : '#16C47F',
                'url' => route('show.calendar', $calendar->id)
            ];
        })->toArray();
    }
    public function getCalendarById($id)
    {
        $calendar = Calendar::findOrFail($id);
        $customerLoginIds = $calendar->customer_login_id ? explode(',', $calendar->customer_login_id) : [];

        $committees = Committees::select('id', 'id_login', 'committee_name as name', 'email')->get();
        $corporates = CusCorporate::with(['field', 'market', 'targetCustomer'])
            ->select('id', 'id_login', 'company_vn as name', 'email', 'size_company', 'feild_id', 'market_id', 'target_customer_id')
            ->get();
        $personals = PersonalCustomer::with('field')
            ->select('id', 'id_login', 'personal_customer_name as name', 'email', 'feild_id')
            ->get();
        $partners = Partner::select('id', 'id_login', 'company_vn as name')->get();

        $recipients = collect();
        foreach ($customerLoginIds as $loginId) {
            if ($committee = $committees->where('id_login', $loginId)->first()) {
                $recipients->push((object)[
                    'customer_type' => 'committee',
                    'customer_id' => $committee->id
                ]);
            }
            if ($corporate = $corporates->where('id_login', $loginId)->first()) {
                $recipients->push((object)[
                    'customer_type' => 'corporate',
                    'customer_id' => $corporate->id
                ]);
            }
            if ($personal = $personals->where('id_login', $loginId)->first()) {
                $recipients->push((object)[
                    'customer_type' => 'personal',
                    'customer_id' => $personal->id
                ]);
            }
            if ($partner = $partners->where('id_login', $loginId)->first()) {
                $recipients->push((object)[
                    'customer_type' => 'partner',
                    'customer_id' => $partner->id
                ]);
            }
        }

        if ($calendar->manual_email) {
            $recipients->push((object)[
                'customer_type' => 'manual',
                'manual_email' => $calendar->manual_email
            ]);
        }

        if (request()->route()->getName() === 'edit.calendar') {
            return [
                'calendar' => $calendar,
                'recipients' => $recipients,
                'committees' => $committees,
                'corporates' => $corporates,
                'personals' => $personals,
                'partners' => $partners
            ];
        }

        return [
            'calendar' => $calendar,
            'customers' => $this->formatCustomers($customerLoginIds, $committees, $corporates, $personals, $partners, $calendar),
            'committees' => $committees,
            'corporates' => $corporates,
            'personals' => $personals,
            'partners' => $partners
        ];
    }

    private function formatCustomers($customerLoginIds, $committees, $corporates, $personals, $partners, $calendar) 
    {
        $customers = [];
    
        foreach ($customerLoginIds as $loginId) {
            if ($committee = $committees->firstWhere('id_login', $loginId)) {
                $customers[] = [
                    'id_login' => $committee->id_login,
                    'name' => $committee->name, 
                    'email' => $committee->email,
                    'type' => 'Ban chấp hành',
                    'field_name' => '-',
                    'market_name' => '-', 
                    'target_customer_name' => '-',
                    'size_company' => '-'
                ];
                continue;
            }
    
            if ($corporate = $corporates->firstWhere('id_login', $loginId)) {
                $customers[] = [
                    'id_login' => $corporate->id_login,
                    'name' => $corporate->name, 
                    'email' => $corporate->email,
                    'type' => 'Khách hàng doanh nghiệp',
                    'field_name' => optional($corporate->field)->field_name ?? '-',
                    'market_name' => optional($corporate->market)->market_name ?? '-',
                    'target_customer_name' => optional($corporate->targetCustomer)->target_customer_name ?? '-', 
                    'size_company' => $corporate->size_company ?? '-'
                ];
                continue;
            }
    
            if ($personal = $personals->firstWhere('id_login', $loginId)) {
                $customers[] = [
                    'id_login' => $personal->id_login,
                    'name' => $personal->name, 
                    'email' => $personal->email,
                    'type' => 'Khách hàng cá nhân',
                    'field_name' => optional($personal->field)->field_name ?? '-',
                    'market_name' => '-',
                    'target_customer_name' => '-',
                    'size_company' => '-'
                ];
                continue;
            }
    
            if ($partner = $partners->firstWhere('id_login', $loginId)) {
                $customers[] = [
                    'id_login' => $partner->id_login,
                    'name' => $partner->name, 
                    'email' => '-',
                    'type' => 'Đối tác doanh nghiệp',
                    'field_name' => '-',
                    'market_name' => '-',
                    'target_customer_name' => '-',
                    'size_company' => '-'
                ];
            }
        }
        if ($calendar->manual_email) {
            $customers[] = [
                'id_login' => '-',
                'name' => '-',
                'email' => $calendar->manual_email,
                'type' => '-',
                'field_name' => '-',
                'market_name' => '-',
                'target_customer_name' => '-',
                'size_company' => '-'
            ];
        }
    
        return $customers;
    }

    public function updateCalendar($id, $data)
    {
        $calendar = Calendar::findOrFail($id);
        $now = now();


        $customerLoginIds = [];
        if (!empty($data['selected'])) {
            foreach ($data['selected'] as $selectedValue) {
                list($type, $customerId) = explode('_', $selectedValue);

                $customer = match ($type) {
                    'committee' => Committees::find($customerId),
                    'corporate' => CusCorporate::find($customerId),
                    'personal' => PersonalCustomer::find($customerId),
                    'partner' => Partner::find($customerId),
                    default => null
                };

                if ($customer) {
                    $customerLoginIds[] = $customer->id_login;
                }
            }
        }

        $dateTime = \Carbon\Carbon::parse($data['date']);
        $status = $dateTime->format('Y-m-d H:i') === $now->format('Y-m-d H:i')
            ? 'active'
            : ($dateTime->gt($now) ? 'inactive' : 'active');

        return $calendar->update([
            'host' => $data['host'],
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'location' => $data['location'],
            'date' => $data['date'],
            'status' => $status,
            'customer_login_id' => implode(',', $customerLoginIds),
            'manual_email' => $data['manual_email'] ?? null
        ]);
    }
}
