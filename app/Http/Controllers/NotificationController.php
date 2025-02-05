<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\NotificationService;
use App\Http\Requests\NotificationRequest;

class NotificationController extends Controller
{
    public function __construct(protected NotificationService $notificationService)
    {
        //
    }
    public function index(Request $request)
    {
        $filters = $request->only([
            'start_date',
            'end_date',
            'method',
            'search'
        ]);
    
        $notifications = $this->notificationService->getAllNotifications($filters);
        return view('notification.index', compact('notifications', 'filters'));
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

        $data = $this->notificationService->getAllData($filters);
        return view('notification.create', $data);
    }

    public function store(NotificationRequest $request)
    {
        $this->notificationService->createNotification($request->validated());
        return redirect()->route('index.notification')
            ->with('success', 'Tạo thông báo thành công');
    }

    public function show(string $id)
    {
        $data = $this->notificationService->getNotificationById($id);
        return view('notification.show', $data);
    }

    public function edit(string $id)
    {
        $data = $this->notificationService->getNotificationById($id);
        return view('notification.edit', $data);
    }
    
    public function update(NotificationRequest $request, string $id)
    {
        $this->notificationService->updateNotification($id, $request->validated());
        return redirect()->route('index.notification')
            ->with('success', 'Cập nhật thông báo thành công');
    }
    
    public function destroy(string $id)
    {
        $this->notificationService->deleteNotification($id);
        return redirect()->route('index.notification')
            ->with('success', 'Xóa thông báo thành công');
    }
}
