<?php

namespace App\Service\Setting;

use App\Models\TargetCustomer;

class TargetCusService
{
    public function createTargetCustomers(array $data)
    {
        return TargetCustomer::create([
            'target_customer_name' => $data['target_customer_name'],
            'target_customer_id' => $data['target_customer_id'],
            'description' => $data['description']
        ]);
    }

    public function getAllTargetCustomers()
    {
        return TargetCustomer::latest()->get();
    }

    public function getTargetCustomers($id)
    {
        return TargetCustomer::findOrFail($id);
    }

    public function updateTargetCustomers($id, array $data)
    {
        $target_customer = TargetCustomer::findOrFail($id);
        return $target_customer->update([
            'target_customer_name' => $data['target_customer_name'],
            'target_customer_id' => $data['target_customer_id'],
            'description' => $data['description']
        ]);
    }

    public function deleteTargetCustomers($id)
    {
        $target_customer = TargetCustomer::findOrFail($id);
        return $target_customer->delete();
    }
}
