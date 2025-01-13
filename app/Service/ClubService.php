<?php

namespace App\Service;

use App\Models\Club;
use Illuminate\Support\Facades\DB;

class ClubService
{
    public function getAllClubs($filters = [])
    {
        $query = Club::with(['major', 'market', 'connectionManagers', 'field']);
    
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('club_name_vn', 'like', "%{$search}%");
            });
        }
    
        if (!empty($filters['field_id'])) {
            $query->where('feild_id', $filters['field_id']);
        }
    
        if (!empty($filters['market_id'])) {
            $query->where('market_id', $filters['market_id']);
        }
    
        return $query->paginate(6);
    }

    public function createClub(array $data)
    {
        DB::beginTransaction();
        $club = Club::create([
            'club_code' => $data['club_code'],
            'club_name_vn' => $data['club_name_vn'],
            'club_name_en' => $data['club_name_en'],
            'club_name_acronym' => $data['club_name_acronym'],
            'address' => $data['address'],
            'tax_number' => $data['tax_number'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'website' => $data['website'],
            'fanpage' => $data['fanpage'],
            'date' => $data['date'],
            'decision' => $data['decision'],
            'major_id' => $data['major_id'],
            'feild_id' => $data['feild_id'],
            'market_id' => $data['market_id'],
            'status' => 'active',
        ]);

        if (isset($data['managers'])) {
            foreach ($data['managers'] as $manager) {
                $club->connectionManagers()->create([
                    'connection_manager_name' => $manager['connection_manager_name'],
                    'position' => $manager['position'],
                    'phone' => $manager['phone'],
                    'gender' => $manager['gender'],
                    'email_connection' => $manager['email_connection']
                ]);
            }
        }

        DB::commit();
        return $club;
    }

    public function getClubById($id)
    {
        return Club::with(['major', 'field', 'market', 'connectionManagers'])->findOrFail($id);
    }

    public function updateClub($id, array $data)
    {
        DB::beginTransaction();

        $club = Club::findOrFail($id);
        $club->update([
            'club_code' => $data['club_code'],
            'club_name_vn' => $data['club_name_vn'],
            'club_name_en' => $data['club_name_en'],
            'club_name_acronym' => $data['club_name_acronym'],
            'address' => $data['address'],
            'tax_number' => $data['tax_number'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'website' => $data['website'],
            'fanpage' => $data['fanpage'],
            'date' => $data['date'],
            'decision' => $data['decision'],
            'major_id' => $data['major_id'],
            'feild_id' => $data['feild_id'],
            'market_id' => $data['market_id']
        ]);

        if (isset($data['managers'])) {
            $club->connectionManagers()->delete();
            foreach ($data['managers'] as $managerData) {
                $club->connectionManagers()->create([
                    'connection_manager_name' => $managerData['connection_manager_name'],
                    'position' => $managerData['position'],
                    'phone' => $managerData['phone'],
                    'gender' => $managerData['gender'],
                    'email_connection' => $managerData['email_connection']
                ]);
            }
        }

        DB::commit();
        return $club;
    }

    public function deleteClub($id)
    {
        DB::beginTransaction();
        $club = Club::findOrFail($id);
        $club->connectionManagers()->delete();
        $club->delete();
        DB::commit();
    }
}
