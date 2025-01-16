<?php

namespace App\Service;

use App\Models\CusCorporate;
use Illuminate\Support\Facades\DB;

class CusCorporateService
{
    public function createCorporate(array $data)
    {
        DB::beginTransaction();
        $data['status'] = 'active';

        $corporate = CusCorporate::create([
            'id_login' => $data['id_login'],
            'id_card' => $data['id_card'],
            'company_vn' => $data['company_vn'],
            'company_en' => $data['company_en'],
            'company_acronym' => $data['company_acronym'],
            'main_address' => $data['main_address'],
            'office_address' => $data['office_address'],
            'tax_number' => $data['tax_number'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'fanpage' => $data['fanpage'],
            'date_of_establishment' => $data['date_of_establishment'],
            'charter_capital' => $data['charter_capital'],
            'revenue' => $data['revenue'],
            'email' => $data['email'],
            'size_company' => $data['size_company'],
            'prize' => $data['prize'],
            'award_certificate' => $data['award_certificate'],
            'status' => $data['status'],
            'certificate_id' => $data['certificate_id'],
            'major_id' => $data['major_id'],
            'feild_id' => $data['feild_id'],
            'market_id' => $data['market_id'],
            'target_customer_id' => $data['target_customer_id'],
            'club_id' => $data['club_id']
        ]);

        if (isset($data['leader'])) {
            $corporate->connectionManagers()->create([
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
                $corporate->connectionManagers()->create($manager);
            }
        }

        DB::commit();
        return $corporate;
    }

    public function getAllCorporates()
    {
        return CusCorporate::with(['field', 'market', 'targetCustomer'])->latest()->paginate(10);
    }

    public function getCorporateById($id)
    {
        return CusCorporate::with(['field', 'market', 'targetCustomer', 'connectionManagers'])
            ->findOrFail($id);
    }

    public function updateCorporate($id, array $data)
    {
        DB::beginTransaction();
        $corporate = CusCorporate::findOrFail($id);
        $corporate->update([
            'id_login' => $data['id_login'],
            'id_card' => $data['id_card'],
            'company_vn' => $data['company_vn'],
            'company_en' => $data['company_en'],
            'company_acronym' => $data['company_acronym'],
            'main_address' => $data['main_address'],
            'office_address' => $data['office_address'],
            'tax_number' => $data['tax_number'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'fanpage' => $data['fanpage'],
            'date_of_establishment' => $data['date_of_establishment'],
            'charter_capital' => $data['charter_capital'],
            'revenue' => $data['revenue'],
            'email' => $data['email'],
            'size_company' => $data['size_company'],
            'prize' => $data['prize'],
            'award_certificate' => $data['award_certificate'],
            'status' => 'active',
            'certificate_id' => $data['certificate_id'],
            'major_id' => $data['major_id'],
            'feild_id' => $data['feild_id'],
            'market_id' => $data['market_id'],
            'target_customer_id' => $data['target_customer_id'],
            'club_id' => $data['club_id']
        ]);

        if (isset($data['leader'])) {
            $corporate->connectionManagers()->where('is_leader', true)->delete();
            $corporate->connectionManagers()->create([
                'connection_manager_name' => $data['leader']['connection_manager_name'],
                'position' => $data['leader']['position'],
                'phone' => $data['leader']['phone'],
                'gender' => $data['leader']['gender'],
                'email_connection' => $data['leader']['email_connection'],
                'is_leader' => 1
            ]);
        }

        if (isset($data['managers'])) {
            $corporate->connectionManagers()->where('is_leader', false)->delete();
            foreach ($data['managers'] as $manager) {
                $manager['is_leader'] = 0;
                $corporate->connectionManagers()->create($manager);
            }
        }

        DB::commit();
        return $corporate;
    }

    public function deleteCorporate($id)
    {
        DB::beginTransaction();
        $corporate = CusCorporate::findOrFail($id);
        $corporate->connectionManagers()->delete();
        $corporate->delete();
        DB::commit();
    }
}
