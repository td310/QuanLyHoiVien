<?php

namespace App\Http\Controllers;

use App\Service\ActivityService;
use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;

class ActivityController extends Controller
{
    public function __construct(protected ActivityService $activityService)
    {
        //
    }

    public function index(Request $request)
    {
        $filters = $request->only(['start_date', 'end_date', 'search']);
        $activities = $this->activityService->getAllActivities($filters);
        return view('activity.index', compact('activities'));
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(ActivityRequest $request)
    {
        try {
            $this->activityService->createActivity($request->validated());
            return redirect()->route('index.activity')
                ->with('success', 'Tạo hoạt động thành công');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $activity = $this->activityService->getActivityById($id);
        return view('activity.show', compact('activity'));
    }

    public function showCustomers(string $id)
    {
        $data = $this->activityService->getActivityCustomers($id);
        return view('activity.customer', $data);
    }

    public function edit(string $id)
    {
        $activity = $this->activityService->getActivityById($id);
        return view('activity.edit', compact('activity'));
    }

    public function update(ActivityRequest $request, string $id)
    {
        try {
            $this->activityService->updateActivity($id, $request->validated());
            return redirect()->route('index.activity')
                ->with('success', 'Cập nhật hoạt động thành công');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
