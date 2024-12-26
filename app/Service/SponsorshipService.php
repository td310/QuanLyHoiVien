<?php

namespace App\Service;

use App\Models\Committees;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Log;

class SponsorshipService
{
    public function getCommitteesForSelection()
    {
        return Committees::select('id', 'committee_name', 'id_card', 'email')
            ->where('status', 'active')
            ->orderBy('committee_name')
            ->get();
    }

    public function getSponsorshipsWithCommittee()
    {
        return Sponsorship::with('committee')->latest()->get();
    }

    public function createSponsorship(array $data)
    {
        $sponsorship = Sponsorship::create([
            'committee_id' => $data['committee_id'],
            'date' => $data['date'],
            'description' => $data['description'],
            'product' => $data['product'],
            'unit' => $data['unit'],
            'price' => floatval($data['price']),
            'quantity' => floatval($data['quantity']),
            'total' => floatval($data['price']) * floatval($data['quantity'])
        ]);

        if (isset($data['attachment'])) {
            $sponsorship->addMedia($data['attachment'])
                ->toMediaCollection('sponsorship_attachments');
        }

        return $sponsorship;
    }

    public function getSponsorshipDetails($id)
    {
        return Sponsorship::with('committee')->findOrFail($id);
    }

    public function deleteSponsorship($id)
    {
        $memFee = Sponsorship::findOrFail($id);
        $memFee->clearMediaCollection('memfee_attachments');
        return $memFee->delete();
    }
}
