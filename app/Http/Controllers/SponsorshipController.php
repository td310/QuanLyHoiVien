<?php

namespace App\Http\Controllers;

use App\Service\SponsorshipService;
use App\Http\Requests\SponsorshipRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function __construct(
        protected SponsorshipService $sponsorshipService
    ) {
        //
    }

    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $search = $request->search;
        $sponsorships = $this->sponsorshipService->getSponsorshipsWithCommittee($startDate, $endDate, $search);
        return view('sponsorship.index', compact('sponsorships'));
    }

    public function create()
    {
        $corporates = $this->sponsorshipService->getCusCorporatesForSelection();
        $committees = $this->sponsorshipService->getCommitteesForSelection();
        return view('sponsorship.create', compact('committees', 'corporates'));
    }

    public function store(SponsorshipRequest $request)
    {
        $this->sponsorshipService->createSponsorship($request->validated());
        return redirect()->route('index.sponsorship')->with('success', 'Thêm tài trợ thành công');
    }


    public function show(string $id)
    {
        $sponsorships = $this->sponsorshipService->getSponsorshipDetails($id);
        return view('sponsorship.show', compact('sponsorships'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $this->sponsorshipService->deleteSponsorship($id);
        return redirect()->route('index.sponsorship')->with('success', 'Xóa tài trợ thành công');
    }
}
