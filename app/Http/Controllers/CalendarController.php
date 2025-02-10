<?php

namespace App\Http\Controllers;

use App\Service\CalendarService;
use Illuminate\Http\Request;
use App\Http\Requests\CalendarRequest;

class CalendarController extends Controller
{
    public function __construct(protected CalendarService $calendarService)
    {
        //
    }
    public function index(Request $request)
    {
        return view('calendar.index');
    }

    public function create(Request $request)
    {
        $filters = $request->only([
            'member_type',
            'field_id',
            'market_id',
            'target_customer_id',
            'size_company'
        ]);

        $data = $this->calendarService->getAllData($filters);
        return view('calendar.create', $data);
    }

    public function store(CalendarRequest $request)
    {
        $this->calendarService->createCalendar($request->validated());
        return redirect()->route('index.calendar')
            ->with('success', 'Tạo lịch họp thành công');
    }

    public function show(string $id)
    {
        $data = $this->calendarService->getCalendarById($id);
        return view('calendar.show', $data);
    }


    public function edit(string $id)
    {
        $data = $this->calendarService->getCalendarById($id);
        $allData = $this->calendarService->getAllData();
        return view('calendar.edit', array_merge($data, $allData));
    }

    public function update(CalendarRequest $request, string $id)
    {
        $this->calendarService->updateCalendar($id, $request->validated());
        return redirect()->route('index.calendar')
            ->with('success', 'Cập nhật lịch họp thành công');
    }

    public function destroy(string $id) {}

    public function getEvents()
    {
        $events = $this->calendarService->getEvents();
        return response()->json($events);
    }
}
