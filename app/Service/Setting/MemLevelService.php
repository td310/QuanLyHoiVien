<?php

namespace App\Service\Setting;

use App\Models\MembershipLevel;

class MemLevelService
{
    public function createMemLevel(array $data)
    {
        return MembershipLevel::create([
            'membership_level_name' => $data['membership_level_name'],
            'fee' => $data['fee'],
            'contribute' => $data['contribute'],
            'description' => $data['description']
        ]);
    }

    public function getAllMemLevels()
    {
        return MembershipLevel::latest()->get();
    }

    public function getMemLevel($id)
    {
        return MembershipLevel::findOrFail($id);
    }

    public function updateMemLevel($id, array $data)
    {
        $membership_level = MembershipLevel::findOrFail($id);
        return $membership_level->update([
            'membership_level_name' => $data['membership_level_name'],
            'fee' => $data['fee'],
            'contribute' => $data['contribute'],
            'description' => $data['description']
        ]);
    }

    public function deleteMemLevel($id)
    {
        $membership_level = MembershipLevel::findOrFail($id);
        return $membership_level->delete();
    }
}
