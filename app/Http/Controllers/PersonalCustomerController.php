<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Field;
use Illuminate\Http\Request;
use App\Service\PerCustomerService;
use App\Http\Requests\PerCustomerRequest;
class PersonalCustomerController extends Controller
{
    public function __construct(
        protected PerCustomerService $committeeService
    ) {
        //
    }

    public function index(Request $request)
    {
        $filters = $request->only(['status']);
        $search = $request->input('search');
        $customers = $this->committeeService->getAllPersonalCustomers($filters, $search);
        
        return view('customer_partner.customer_personal.index', compact('customers', 'search'));
    }

    public function create()
    {
        $majors = Major::all();
        return view('customer_partner.customer_personal.create',compact('majors'));
    }

    public function store(PerCustomerRequest $request)
    {
        try {
            $this->committeeService->createPersonalCustomer($request->validated());
            return redirect()->route('index.customer_personal')
                ->with('success', 'Thêm khách hàng cá nhân thành công');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $customer = $this->committeeService->getPersonalCustomerById($id);
        return view('customer_partner.customer_personal.show', compact('customer'));
    }
    
    public function edit(string $id)
    {
        $customer = $this->committeeService->getPersonalCustomerById($id);
        $majors = Major::all();
        $fields = Field::where('major_id', $customer->major_id)->get();
        return view('customer_partner.customer_personal.edit', compact('customer', 'majors', 'fields'));
    }
    
    public function update(PerCustomerRequest $request, string $id)
    {
        try {
            $this->committeeService->updatePersonalCustomer($id, $request->validated());
            return redirect()->route('index.customer_personal')
                ->with('success', 'Cập nhật khách hàng cá nhân thành công');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
    
    public function destroy(string $id)
    {
        try {
            $this->committeeService->deletePersonalCustomer($id);
            return redirect()->route('index.customer_personal')
                ->with('success', 'Xóa khách hàng cá nhân thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Có lỗi xảy ra khi xóa']);
        }
    }
}
