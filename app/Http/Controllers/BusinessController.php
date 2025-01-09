<?php

namespace App\Http\Controllers;

use App\Service\Setting\BusinessService;
use App\Http\Requests\BusinessRequest;

class BusinessController extends Controller
{
    public function __construct(protected BusinessService $businessService)
    {
        //
    }
    public function index()
    {
        $business = $this->businessService->getAllBusiness();
        return view('settings_menu.business.index', compact('business'));
    }

    public function create()
    {
        return view('settings_menu.business.create');
    }

    public function store(BusinessRequest $request)
    {
        $this->businessService->createBusiness($request->validated());
        return redirect()->route('index.business')->with('success', 'Thêm doanh nghiệp thành công');
    }

    public function show(string $id)
    {
        $business = $this->businessService->getBusiness($id);
        return view('settings_menu.business.show', compact('business'));
    }


    public function edit(string $id)
    {
        $business = $this->businessService->getBusiness($id);
        return view('settings_menu.business.edit', compact('business'));
    }

    public function update(BusinessRequest $request, string $id)
    {
        $this->businessService->updateBusiness($id, $request->validated());
        return redirect()->route('index.business')->with('success', 'Cập nhật doanh nghiệp thành công');
    }

    public function destroy(string $id)
    {
        $this->businessService->deleteBusiness($id);
        return redirect()->route('index.business')->with('success', 'Xóa doanh nghiệp thành công');
    }
}
