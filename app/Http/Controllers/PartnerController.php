<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Service\PartnerService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct(protected PartnerService $partnerService)
    {
        //
    }

    public function index(Request $request)
    {
        $nation = $request->query('nation');
        $search = $request->input('search');

        $partners = $this->partnerService->getAllPartners($nation,$search);

        return view('customer_partner.partner.index', compact(
            'partners',
            'search'
        ));
    }

    public function create()
    {
        return view('customer_partner.partner.create');
    }

    public function store(PartnerRequest $request)
    {
        $this->partnerService->createPartner($request->validated());
        return redirect()->route('index.partner')->with('success', 'Thêm đối tác doanh nghiệp thành công');
    }
    public function show(string $id)
    {
        $partner = $this->partnerService->getPartnerById($id);
        return view('customer_partner.partner.show', compact('partner'));
    }
    
    public function edit(string $id)
    {
        $partner = $this->partnerService->getPartnerById($id);
        return view('customer_partner.partner.edit', compact('partner'));
    }
    
    public function update(PartnerRequest $request, string $id)
    {
        try {
            $this->partnerService->updatePartner($id, $request->validated());
            return redirect()->route('index.partner')
                ->with('success', 'Cập nhật đối tác doanh nghiệp thành công');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
    
    public function destroy(string $id)
    {
        try {
            $this->partnerService->deletePartner($id);
            return redirect()->route('index.partner')
                ->with('success', 'Xóa đối tác doanh nghiệp thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Có lỗi xảy ra khi xóa']);
        }
    }
}
