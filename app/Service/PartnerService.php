<?php

namespace App\Service;

use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class PartnerService
{
    public function createPartner(array $data)
    {
        DB::beginTransaction();
        $data['status'] = 'active';

        $partner = Partner::create([
            'id_login' => $data['id_login'],
            'id_card' => $data['id_card'],
            'company_vn' => $data['company_vn'],
            'company_en' => $data['company_en'],
            'company_acronym' => $data['company_acronym'],
            'main_address' => $data['main_address'],
            'office_address' => $data['office_address'],
            'tax_number' => $data['tax_number'],
            'website' => $data['website'] ?? null,
            'phone' => $data['phone'],
            'status' => 'active'
        ]);

        if (isset($data['leader'])) {
            $partner->connectionManagers()->create([
                'connection_manager_name' => $data['leader']['connection_manager_name'],
                'position' => $data['leader']['position'],
                'phone' => $data['leader']['phone'],
                'gender' => $data['leader']['gender'],
                'email_connection' => $data['leader']['email_connection'],
                'is_leader' => (int) $data['leader']['is_leader'],
            ]);
        }
        if (isset($data['managers'])) {
            foreach ($data['managers'] as $manager) {
                $manager['is_leader'] = 0;
                $partner->connectionManagers()->create($manager);
            }
        }

        DB::commit();
        return $partner;
    }

    public function getAllPartners($nation = null,$search = null)
    {
        $query = Partner::query();

        if ($nation) {
            $query->where('nation', $nation);
        }

        if ($search) {
            $query->where('id_login', 'like', "%{$search}%")
                ->orWhere('company_vn', 'like', "%{$search}%");
        }

        return $query->latest()->paginate(6);
    }

    public function getPartnerById($id)
    {
        return Partner::with(['connectionManagers'])->findOrFail($id);
    }

    public function updatePartner($id, array $data)
    {
        DB::beginTransaction();
        $partner = Partner::findOrFail($id);
        $partner->update([
            'id_login' => $data['id_login'],
            'id_card' => $data['id_card'],
            'company_vn' => $data['company_vn'],
            'company_en' => $data['company_en'],
            'company_acronym' => $data['company_acronym'],
            'main_address' => $data['main_address'],
            'office_address' => $data['office_address'],
            'tax_number' => $data['tax_number'],
            'website' => $data['website'] ?? null,
            'phone' => $data['phone'],
            'nation' => $data['nation']
        ]);

        if (isset($data['leader'])) {
            $partner->connectionManagers()->where('is_leader', true)->delete();
            $partner->connectionManagers()->create([
                'connection_manager_name' => $data['leader']['connection_manager_name'],
                'position' => $data['leader']['position'],
                'phone' => $data['leader']['phone'],
                'gender' => $data['leader']['gender'],
                'email_connection' => $data['leader']['email_connection'],
                'is_leader' => 1
            ]);
        }

        if (isset($data['managers'])) {
            $partner->connectionManagers()->where('is_leader', false)->delete();
            foreach ($data['managers'] as $manager) {
                $manager['is_leader'] = 0;
                $partner->connectionManagers()->create($manager);
            }
        }

        DB::commit();
        return $partner;
    }

    public function deletePartner($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->connectionManagers()->delete();
        $partner->delete();
        DB::commit();
    }
}
