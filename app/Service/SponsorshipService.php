<?php

namespace App\Service;

use App\Models\Committees;
use App\Models\Sponsorship;
use App\Models\CusCorporate;

class SponsorshipService
{
    public function getCommitteesForSelection()
    {
        return Committees::select('id', 'committee_name', 'id_card', 'email')
            ->where('status', 'active')
            ->orderBy('committee_name')
            ->get();
    }

    public function getCusCorporatesForSelection()
    {
        return CusCorporate::select('id', 'company_vn', 'id_card', 'email')
            ->where('status', 'active')
            ->orderBy('company_vn')
            ->get();
    }

    public function getSponsorshipsWithCommittee($startDate = null, $endDate = null, $search = null)
    {
        $query = Sponsorship::with('committee');
        
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }
    
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->whereHas('committee', function($subQ) use ($search) {
                    $subQ->where('committee_name', 'LIKE', "%{$search}%");
                })
                ->orWhere('product', 'LIKE', "%{$search}%")
                ->orWhere('unit', 'LIKE', "%{$search}%")
                ->orWhere('quantity', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%");
            });
        }
        
        return $query->latest()->paginate(6);
    }
    
    public function createSponsorship(array $data)
    {
        $sponsorship = Sponsorship::create([
            'committee_id' => $data['committee_id'] ?? null,
            'cuscorporate_id' => $data['cuscorporate_id'] ?? null,
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
        return Sponsorship::with(['committee', 'cuscorporate'])->findOrFail($id);
    }

    public function deleteSponsorship($id)
    {
        $memFee = Sponsorship::findOrFail($id);
        $memFee->clearMediaCollection('memfee_attachments');
        return $memFee->delete();
    }
}
