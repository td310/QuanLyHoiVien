<?php

namespace App\Service\Setting;

use App\Models\Organization;

class OrganizationService
{
    public function createOrganization(array $data)
    {
        return Organization::create([
            'organization_name' => $data['organization_name'],
            'organization_id' => $data['organization_id'],
            'description' => $data['description']
        ]);
    }

    public function getAllOrganizations($search = null)
    {
        $query = Organization::query();
        
        if ($search) {
            $query->where('organization_id', 'like', "%{$search}%")
                  ->orWhere('organization_name', 'like', "%{$search}%");
        }
        
        return $query->latest()->paginate(6);
    }
    public function getOrganization($id)
    {
        return Organization::findOrFail($id);
    }

    public function updateOrganization($id, array $data)
    {
        $organization = Organization::findOrFail($id);
        return $organization->update([
            'organization_name' => $data['organization_name'],
            'organization_id' => $data['organization_id'],
            'description' => $data['description']
        ]);
    }

    public function deleteOrganization($id)
    {
        $organization = Organization::findOrFail($id);
        return $organization->delete();
    }
}
