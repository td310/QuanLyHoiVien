<?php

namespace App\Service;

use App\Models\MemFee;
use App\Models\Committees;
class MemFeeService
{
    public function getCommitteesForSelection()
    {
        return Committees::select('id', 'committee_name', 'id_card', 'email')
            ->where('status', 'active')
            ->orderBy('committee_name')
            ->get();
    }

    public function createMemFee(array $data)
    {
        $memFee = MemFee::create([
            'committee_id' => $data['committee_id'],
            'date' => $data['date'],
            'description' => $data['description'],
            'debt' => $data['debt'],
            'status' => 'unpaid'
        ]);

        if (isset($data['attachment'])) {
            $memFee->addMedia($data['attachment'])
                ->toMediaCollection('memfee_attachments');
        }

        return $memFee;
    }

    public function updatePaymentStatus($id)
    {
        $memFee = MemFee::findOrFail($id);
        return $memFee->update(['status' => 'paid']);
    }

    public function getMemFeeDetails($id)
    {
        return MemFee::with('committee')->findOrFail($id);
    }

    public function deleteMemFee($id)
    {
        $memFee = MemFee::findOrFail($id);
        $memFee->clearMediaCollection('memfee_attachments');
        return $memFee->delete();
    }

    public function getMemFeesWithCommittee()
    {
        return MemFee::with('committee')->latest()->get();
    }
}