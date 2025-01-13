<?php

namespace App\Service\Setting;

use App\Models\Major;

class MajorService
{
    public function createMajor(array $data)
    {
        return Major::create([
            'major_name' => $data['major_name'],
            'major_id' => $data['major_id'],
            'description' => $data['description']
        ]);
    }

    public function getAllMajors($search = null)
    {
        $query = Major::query();

        if ($search) {
            $query->where('major_id', 'like', "%{$search}%")
                ->orWhere('major_name', 'like', "%{$search}%");
        }

        return $query->latest()->paginate(6);
    }

    public function getAllMajorsForSelection()
    {
        return Major::all();
    }

    public function getMajor($id)
    {
        return Major::findOrFail($id);
    }

    public function updateMajor($id, array $data)
    {
        $major = Major::findOrFail($id);
        return $major->update([
            'major_name' => $data['major_name'],
            'major_id' => $data['major_id'],
            'description' => $data['description']
        ]);
    }

    public function deleteMajor($id)
    {
        $major = Major::findOrFail($id);
        return $major->delete();
    }
}
