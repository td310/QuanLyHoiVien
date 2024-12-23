<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommitteeRequest;
use App\Service\CommitteeService;

class CommitteeController extends Controller
{
    public function __construct(
        protected CommitteeService $committeeService
    ) {
        //
    }

    public function index()
    {
        $committees = $this->committeeService->getAllCommittees();
        return view('customer_partner.index', compact('committees'));
    }

    public function create()
    {
        return view('customer_partner.create');
    }

    public function store(CommitteeRequest $request)
    {
        $this->committeeService->createCommittee($request->validated());
        return redirect()->route('index.customer_partner')
            ->with('success', 'Thêm mới thành công');
    }

    public function show(string $id)
    {
        $committee = $this->committeeService->getCommitteeById($id);
        return view('customer_partner.show', compact('committee'));
    }

    public function edit(string $id)
    {
        $committee = $this->committeeService->getCommitteeById($id);
        return view('customer_partner.edit', compact('committee'));
    }


    public function update(CommitteeRequest $request, string $id)
    {
        $this->committeeService->updateCommittee($id, $request->validated());
        return redirect()->route('index.customer_partner')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy(string $id)
    {
        $this->committeeService->deleteCommittee($id);
        return redirect()->route('index.customer_partner')
            ->with('success', 'Xóa thành công');
    }

    public function fees(string $id)
    {
        $committee = $this->committeeService->getCommitteeWithFees($id);
        return view('customer_partner.committee_fee', compact('committee'));
    }
}
