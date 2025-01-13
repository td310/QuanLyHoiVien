<?php

namespace App\Service\Setting;

use App\Models\Business;

class BusinessService
{
    public function createBusiness(array $data)
    {
        return Business::create([
            'business_name' => $data['business_name'],
            'business_id' => $data['business_id'],
            'description' => $data['description']
        ]);
    }

    public function getAllBusiness($search = null)
    {
        $query = Business::query();
        
        if ($search) {
            $query->where('business_id', 'like', "%{$search}%")
                  ->orWhere('business_name', 'like', "%{$search}%");
        }
        
        return $query->latest()->paginate(6);
    }

    public function getBusiness($id)
    {
        return Business::findOrFail($id);
    }

    public function updateBusiness($id, array $data)
    {
        $business = Business::findOrFail($id);
        return $business->update([
            'business_name' => $data['business_name'],
            'business_id' => $data['business_id'],
            'description' => $data['description']
        ]);
    }

    public function deleteBusiness($id)
    {
        $business = Business::findOrFail($id);
        return $business->delete();
    }
}
