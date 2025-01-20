<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\MemFeeService;
use App\Http\Requests\MemFeeRequest;

class MemFeeController extends Controller
{
    public function __construct(protected MemFeeService $memFeeService)
    {
        //
    }

    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $status = $request->status;
        $search = $request->search;
        $memFees = $this->memFeeService->getMemFeesWithCommittee($startDate, $endDate, $status, $search);
        return view('membership_fee.index', compact('memFees'));
    }

    public function create()
    {
        try {
            $committees = $this->memFeeService->getCommitteesForSelection();
            $corporates = $this->memFeeService->getCusCorporatesForSelection();
            return view('membership_fee.create', compact('committees', 'corporates'));
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }


    public function store(MemFeeRequest $request)
    {
        $this->memFeeService->createMemFee($request->validated());
        return redirect()->route('index.membership_fee')->with('success', 'Thêm hội phí thành công');
    }

    public function show(string $id)
    {
        $memFee = $this->memFeeService->getMemFeeDetails($id);
        return view('membership_fee.show', compact('memFee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->memFeeService->deleteMemFee($id);
        return redirect()->route('index.membership_fee')->with('success', 'Xóa hội phí thành công');
    }

    public function pay($id)
    {
        $this->memFeeService->updatePaymentStatus($id);
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
