<?php

namespace App\Service;

use App\Models\Committees;

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

    public function getAllCommittees()
    {
        return Committees::latest()->get();
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

    public function getCommitteeWithFees($id)
    {
        return Committees::with(['memFees' => function ($query) {
            $query->latest();
        }])->findOrFail($id);
    }
}
