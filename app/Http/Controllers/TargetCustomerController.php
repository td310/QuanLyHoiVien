<?php

namespace App\Http\Controllers;

use App\Http\Requests\TargetCusRequest;
use App\Service\Setting\TargetCusService;
use Illuminate\Http\Request;

class TargetCustomerController extends Controller
{
    public function __construct(protected TargetCusService $targetCustomerService)
    {
        //
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $target_customers = $this->targetCustomerService->getAllTargetCustomers($search);
        return view('settings_menu.target_customer.index', compact('target_customers', 'search'));
    }

    public function create()
    {
        return view('settings_menu.target_customer.create');
    }

    public function store(TargetCusRequest $request)
    {
        $this->targetCustomerService->createTargetCustomers($request->validated());
        return redirect()->route('index.target_customer')->with('success', 'Thêm MTKH thành công');
    }

    public function show(string $id)
    {
        $target_customer = $this->targetCustomerService->getTargetCustomers($id);
        return view('settings_menu.target_customer.show', compact('target_customer'));
    }

    public function edit(string $id)
    {
        $target_customer = $this->targetCustomerService->getTargetCustomers($id);
        return view('settings_menu.target_customer.edit', compact('target_customer'));
    }

    public function update(TargetCusRequest $request, string $id)
    {
        $this->targetCustomerService->updateTargetCustomers($id, $request->validated());
        return redirect()->route('index.target_customer')->with('success', 'Cập nhật MTKH thành công');
    }

    public function destroy(string $id)
    {
        $this->targetCustomerService->deleteTargetCustomers($id);
        return redirect()->route('index.target_customer')->with('success', 'Xóa MTKH thành công');
    }
}
