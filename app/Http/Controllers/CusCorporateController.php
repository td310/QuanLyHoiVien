<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Market;
use App\Models\Club;
use App\Models\Certificate;
use App\Models\TargetCustomer;
use App\Http\Requests\CusCorporateRequest;
use App\Service\CusCorporateService;

class CusCorporateController extends Controller
{
    public function __construct(protected CusCorporateService $cusCorporateService)
    {
        //
    }

    public function index()
    {
        $corporates = $this->cusCorporateService->getAllCorporates();
        return view('customer_partner.customer_corporate.index', compact('corporates'));
    }

    public function create()
    {
        $majors = Major::all();
        $markets = Market::all();
        $targets = TargetCustomer::all();
        $clubs = Club::all();
        $certificates = Certificate::all();
        return view('customer_partner.customer_corporate.create', compact('majors', 'markets', 'targets', 'clubs', 'certificates'));
    }

    public function store(CusCorporateRequest $request)
    {
        try {
            $this->cusCorporateService->createCorporate($request->validated());
            return redirect()->route('index.customer_corporate')->with('success', 'Thêm khách hàng doanh nghiệp thành công');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $corporate = $this->cusCorporateService->getCorporateById($id);
        return view('customer_partner.customer_corporate.show', compact('corporate'));
    }

    public function edit(string $id)
    {
        $corporate = $this->cusCorporateService->getCorporateById($id);
        $majors = Major::all();
        $markets = Market::all();
        $targets = TargetCustomer::all();
        $clubs = Club::all();
        $certificates = Certificate::all();
        return view(
            'customer_partner.customer_corporate.edit',
            compact('corporate', 'majors', 'markets', 'targets', 'clubs', 'certificates')
        );
    }

    public function update(CusCorporateRequest $request, string $id)
    {
        try {
            $this->cusCorporateService->updateCorporate($id, $request->validated());
            return redirect()->route('index.customer_corporate')
                ->with('success', 'Cập nhật khách hàng doanh nghiệp thành công');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->cusCorporateService->deleteCorporate($id);
            return redirect()->route('index.customer_corporate')
                ->with('success', 'Xóa khách hàng doanh nghiệp thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Có lỗi xảy ra khi xóa']);
        }
    }
}
