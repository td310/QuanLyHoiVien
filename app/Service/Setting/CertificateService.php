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

    public function getAllCertificates()
    {
        return Certificate::latest()->get();
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
