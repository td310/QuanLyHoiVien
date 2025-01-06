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

    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');
        $committees = $this->committeeService->getAllCommittees($status, $search);
        return view('customer_partner.committee.index', compact('committees'));
    }

    public function create()
    {
        return view('customer_partner.committee.create');
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
        return view('customer_partner.committee.show', compact('committee'));
    }

    public function edit(string $id)
    {
        $committee = $this->committeeService->getCommitteeById($id);
        return view('customer_partner.committee.edit', compact('committee'));
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

    public function fees(Request $request, string $id)
    {
        $year = $request->year;
        $search = $request->search;
        $years = $this->committeeService->getDistinctYears();
        $committee = $this->committeeService->getCommitteeWithFees($id, $year, $search);
        return view('customer_partner.committee.committee_fee', compact('committee', 'years'));
    }

    public function sponsorships(Request $request, string $id)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $search = $request->search;
        $committee = $this->committeeService->getCommitteeWithSponsorship($id, $startDate, $endDate, $search);
        return view('customer_partner.committee.sponsorship', compact('committee'));
    }
}
