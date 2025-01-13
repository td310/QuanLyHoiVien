<?php

namespace App\Service\Setting;

use App\Models\Market;

class MarketService
{
    public function createMarket(array $data)
    {
        return Market::create([
            'market_name' => $data['market_name'],
            'market_id' => $data['market_id'],
            'description' => $data['description']
        ]);
    }

    public function getAllMarkets($search = null)
    {
        $query = Market::query();
        
        if ($search) {
            $query->where('market_id', 'like', "%{$search}%")
                  ->orWhere('market_name', 'like', "%{$search}%");
        }
        
        return $query->latest()->paginate(6);
    }

    public function getMarket($id)
    {
        return Market::findOrFail($id);
    }

    public function updateMarket($id, array $data)
    {
        $market = Market::findOrFail($id);
        return $market->update([
            'market_name' => $data['market_name'],
            'market_id' => $data['market_id'],
            'description' => $data['description']
        ]);
    }

    public function deletemarket($id)
    {
        $market = Market::findOrFail($id);
        return $market->delete();
    }
}
