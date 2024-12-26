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

    public function index()
    {
        $sponsorships = $this->sponsorshipService->getSponsorshipsWithCommittee();
        return view('sponsorship.index', compact('sponsorships'));
    }

    public function create()
    {
        $committees = $this->sponsorshipService->getCommitteesForSelection();
        return view('sponsorship.create', compact('committees'));
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
