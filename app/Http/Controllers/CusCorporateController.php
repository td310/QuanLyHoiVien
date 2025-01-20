<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Market;
use App\Models\Club;
use App\Models\Field;
use App\Models\Certificate;
use App\Models\CusCorporate;
use App\Models\TargetCustomer;
use App\Http\Requests\CusCorporateRequest;
use App\Service\CusCorporateService;
use Illuminate\Http\Request;

class CusCorporateController extends Controller
{
    public function __construct(protected CusCorporateService $cusCorporateService)
    {
        //
    }

    public function index(Request $request)
    {
        $fields = Field::all();
        $markets = Market::all();
        $targetCustomers = TargetCustomer::all();
        $addresses = CusCorporate::select('main_address')->distinct()->get();
        
        $filters = $request->only(['field_id', 'market_id', 'target_customer_id', 'main_address']);
        $search = $request->input('search');

        $corporates = $this->cusCorporateService->getAllCorporates($filters, $search);
        
        return view('customer_partner.customer_corporate.index', compact(
            'corporates', 'fields', 'markets', 'targetCustomers', 'addresses', 'search'
        ));
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
        $this->cusCorporateService->createCorporate($request->validated());
        return redirect()->route('index.customer_corporate')->with('success', 'Thêm khách hàng doanh nghiệp thành công');
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
        $this->cusCorporateService->updateCorporate($id, $request->validated());
        return redirect()->route('index.customer_corporate')
            ->with('success', 'Cập nhật khách hàng doanh nghiệp thành công');
    }

    public function destroy(string $id)
    {
        $this->cusCorporateService->deleteCorporate($id);
        return redirect()->route('index.customer_corporate')
            ->with('success', 'Xóa khách hàng doanh nghiệp thành công');
    }

    public function fees(Request $request, string $id)
    {
        $year = $request->year;
        $search = $request->search;
        $years = $this->cusCorporateService->getDistinctYears();
        $corporate = $this->cusCorporateService->getCorporateWithFees($id, $year, $search);
        return view('customer_partner.customer_corporate.cuscorporate_fee', compact('corporate', 'years'));
    }

    public function sponsorships(Request $request, string $id)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $search = $request->search;
        $corporate = $this->cusCorporateService->getCusCorporateWithSponsorship($id, $startDate, $endDate, $search);
        return view('customer_partner.customer_corporate.sponsorship', compact('corporate'));
    }
}
