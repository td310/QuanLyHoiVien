<?php

namespace App\Service\Setting;

use App\Models\Certificate;

class CertificateService
{
    public function createCertificate(array $data)
    {
        return Certificate::create([
            'certificate_name' => $data['certificate_name'],
            'certificate_id' => $data['certificate_id'],
            'description' => $data['description']
        ]);
    }

    public function getAllCertificates($search = null)
    {
        $query = Certificate::query();
        
        if ($search) {
            $query->where('certificate_id', 'like', "%{$search}%")
                  ->orWhere('certificate_name', 'like', "%{$search}%");
        }
        
        return $query->latest()->paginate(6);
    }

    public function getCertificate($id)
    {
        return Certificate::findOrFail($id);
    }

    public function updateCertificate($id, array $data)
    {
        $certificate = Certificate::findOrFail($id);
        return $certificate->update([
            'certificate_name' => $data['certificate_name'],
            'certificate_id' => $data['certificate_id'],
            'description' => $data['description']
        ]);
    }

    public function deleteCertificate($id)
    {
        $certificate = Certificate::findOrFail($id);
        return $certificate->delete();
    }
}
