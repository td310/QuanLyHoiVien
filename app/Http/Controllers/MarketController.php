<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarketRequest;
use App\Service\Setting\MarketService; 

class MarketController extends Controller
{
    public function __construct(protected MarketService $marketService)
    {
        //
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $markets = $this->marketService->getAllMarkets($search);
        return view('settings_menu.market.index', compact('markets', 'search'));
    }

    public function create()
    {
        return view('settings_menu.market.create');
    }

    public function store(MarketRequest $request)
    {
        $this->marketService->createMarket($request->validated());
        return redirect()->route('index.market')->with('success', 'Thêm thị trường thành công');
    }

    public function show(string $id)
    {
        $market = $this->marketService->getMarket($id);
        return view('settings_menu.market.show', compact('market'));
    }

    public function edit(string $id)
    {
        $market = $this->marketService->getMarket($id);
        return view('settings_menu.market.edit', compact('market'));
    }

    public function update(MarketRequest $request, string $id)
    {
        $this->marketService->updateMarket($id, $request->validated());
        return redirect()->route('index.market')->with('success', 'Cập nhật thị trường thành công');
    }

    public function destroy(string $id)
    {
        $this->marketService->deleteMarket($id);
        return redirect()->route('index.market')->with('success', 'Xóa thị trường thành công');
    }
}
