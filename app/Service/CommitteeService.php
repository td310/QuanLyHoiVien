<?php

namespace App\Service;

use App\Models\Committees;
use App\Models\MemFee;

class CommitteeService
{
    public function createCommittee($data)
    {
        $committee = Committees::create([
            'id_login' => $data['id_login'],
            'committee_name' => $data['committee_name'],
            'id_card' => $data['id_card'],
            'phone' => $data['phone'],
            'gender' => $data['gender'] ?? 'male',
            'email' => $data['email'],
            'date_of_birth' => $data['date_of_birth'],
            'unit' => $data['unit'],
            'position' => $data['position'],
            'title' => $data['title'],
            'term' => $data['term'],
            'attendance' => $data['attendance'] ?? 'present',
            'status' => 'active',
        ]);

        if (isset($data['image'])) {
            $committee->addMedia($data['image'])
                ->toMediaCollection('committee_image');
        }

        return $committee;
    }

    public function getAllCommittees($status = null, $search = null)
    {
        $query = Committees::query();
        
        if ($status) {
            $query->where('status', $status);
        }
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id_card', 'LIKE', "%{$search}%")
                  ->orWhere('committee_name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('unit', 'LIKE', "%{$search}%")
                  ->orWhere('position', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
            });
        }
        
        return $query->latest()->paginate(6);
    }

    public function deleteCommittee($id)
    {
        $committee = Committees::findOrFail($id);
        return $committee->delete();
    }

    public function getCommitteeById($id)
    {
        return Committees::findOrFail($id);
    }

    public function updateCommittee($id, $data)
    {
        $committee = Committees::findOrFail($id);

        $committee->update([
            'id_login' => $data['id_login'],
            'committee_name' => $data['committee_name'],
            'id_card' => $data['id_card'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'date_of_birth' => $data['date_of_birth'],
            'unit' => $data['unit'],
            'position' => $data['position'],
            'title' => $data['title'],
            'term' => $data['term'],
            'attendance' => $data['attendance'],
            'status' => $data['status'],
        ]);

        if (isset($data['image'])) {
            $committee->clearMediaCollection('committee_image');
            $committee->addMedia($data['image'])
                ->toMediaCollection('committee_image');
        }

        return $committee;
    }

    public function getDistinctYears()
    {
        return MemFee::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
    }
    
    public function getCommitteeWithFees($id, $year = null, $search = null)
    {
        $committee = Committees::with(['memFees' => function ($query) use ($year, $search) {
            if ($year) {
                $query->whereYear('date', $year);
            }
            
            if ($search) {
                if (preg_match('/^\d{2}\/\d{2}$/', $search)) {
                    $parts = explode('/', $search);
                    $day = $parts[0];
                    $month = $parts[1];
                    
                    $query->whereDay('date', $day)
                          ->whereMonth('date', $month);
                } else {
                    $query->where(function($q) use ($search) {
                        $q->whereYear('date', 'LIKE', "%{$search}%")
                          ->orWhereMonth('date', 'LIKE', "%{$search}%")
                          ->orWhereDay('date', 'LIKE', "%{$search}%")
                          ->orWhere('date', 'LIKE', "%{$search}%");
                    });
                }
            }
            
            $query->latest();
        }])->findOrFail($id);
    
        return $committee;
    }

    public function getCommitteeWithSponsorship($id, $startDate = null, $endDate = null, $search = null)
    {
        $committee = Committees::with(['sponsorships' => function ($query) use ($startDate, $endDate, $search){
            if ($startDate && $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            }

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('product', 'LIKE', "%{$search}%")
                    ->orWhere('unit', 'LIKE', "%{$search}%");
                });
            }
            $query->latest();
        }])->findOrFail($id);

        return $committee;
    }
}
