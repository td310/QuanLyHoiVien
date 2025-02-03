<?php

namespace App\Service;

use App\Models\PersonalCustomer;

class PerCustomerService
{
    public function createPersonalCustomer(array $data)
    {
        return PersonalCustomer::create([
            'personal_customer_name' => $data['personal_customer_name'],
            'id_login' => $data['id_login'],
            'id_card' => $data['id_card'],
            'position' => $data['position'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'unit' => $data['unit'],
            'term' => $data['term'],
            'title' => $data['title'],
            'status' => $data['status'],
            'major_id' => $data['major_id'],
            'feild_id' => $data['feild_id'],
        ]);
    }

    public function getAllPersonalCustomers($filters = [], $search = null)
    {
        $query = PersonalCustomer::with(['major', 'field']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id_login', 'like', "%{$search}%")
                    ->orWhere('personal_customer_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->latest()->paginate(10);
    }

    public function getPersonalCustomerById($id)
    {
        return PersonalCustomer::with(['major', 'field'])->findOrFail($id);
    }

    public function updatePersonalCustomer($id, array $data)
    {
        $personalCustomer = PersonalCustomer::findOrFail($id);
        $personalCustomer->update($data);
        return $personalCustomer;
    }

    public function deletePersonalCustomer($id)
    {
        $personalCustomer = PersonalCustomer::findOrFail($id);
        return $personalCustomer->delete();
    }
}
