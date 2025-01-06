<?php

namespace App\Http\Controllers;

use App\Service\Setting\MajorService;
use App\Http\Requests\MajorRequest;

class MajorController extends Controller
{
    public function __construct(protected MajorService $majorService)
    {
        //
    }
    public function index()
    {
        $majors = $this->majorService->getAllMajors();
        return view('settings_menu.major.index', compact('majors'));
    }

    public function create()
    {
        return view('settings_menu.major.create');
    }

    public function store(MajorRequest $request)
    {
        $this->majorService->createMajor($request->validated());
        return redirect()->route('index.major')->with('success', 'Thêm ngành thành công');
    }

    public function show(string $id)
    {
        $major = $this->majorService->getMajor($id);
        return view('settings_menu.major.show', compact('major'));
    }


    public function edit(string $id)
    {
        $major = $this->majorService->getMajor($id);
        return view('settings_menu.major.edit', compact('major'));
    }

    public function update(MajorRequest $request, string $id)
    {
        $this->majorService->updateMajor($id, $request->validated());
        return redirect()->route('index.major')->with('success', 'Cập nhật ngành thành công');
    }

    public function destroy(string $id)
    {
        $this->majorService->deleteMajor($id);
        return redirect()->route('index.major')->with('success', 'Xóa ngành thành công');
    }
}
