<?php

namespace App\Http\Controllers;

use App\Service\Setting\MemLevelService;
use App\Http\Requests\MemLevelRequest;

class MemLevelController extends Controller
{
    public function __construct(protected MemLevelService $membership_levelService)
    {
        //
    }
    public function index()
    {
        $membership_levels = $this->membership_levelService->getAllMemLevels();
        return view('membership_level.index', compact('membership_levels'));
    }

    public function create()
    {
        return view('membership_level.create');
    }

    public function store(MemLevelRequest $request)
    {
        $this->membership_levelService->createMemLevel($request->validated());
        return redirect()->route('index.membership_level')->with('success', 'Thêm hạng thành viên thành công');
    }

    public function show(string $id)
    {
        $membership_level = $this->membership_levelService->getMemLevel($id);
        return view('membership_level.show', compact('membership_level'));
    }


    public function edit(string $id)
    {
        $membership_level = $this->membership_levelService->getMemLevel($id);
        return view('membership_level.edit', compact('membership_level'));
    }

    public function update(MemLevelRequest $request, string $id)
    {
        $this->membership_levelService->updateMemLevel($id, $request->validated());
        return redirect()->route('index.membership_level')->with('success', 'Cập nhật hạng thành viên thành công');
    }

    public function destroy(string $id)
    {
        $this->membership_levelService->deleteMemLevel($id);
        return redirect()->route('index.membership_level')->with('success', 'Xóa hạng thành viên thành công');
    }
}
