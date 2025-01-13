<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Setting\FieldService;
use App\Service\Setting\MajorService;
use App\Http\Requests\FieldRequest;

class FieldController extends Controller
{
    public function __construct(
        protected FieldService $fieldService,
        protected MajorService $majorService
    ) {
        //
    }

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'major_id']);
        $fields = $this->fieldService->getAllFields($filters);
        $majors = $this->majorService->getAllMajorsForSelection();
        return view('settings_menu.field.index', compact('fields', 'majors', 'filters'));
    }
    public function create()
    {
        $majors = $this->majorService->getAllMajors();
        return view('settings_menu.field.create', compact('majors'));
    }


    public function store(FieldRequest $request)
    {
        $this->fieldService->createField($request->validated());
        return redirect()->route('index.field')->with('success', 'Thêm lĩnh vực thành công');
    }

    public function show(string $id)
    {
        $field = $this->fieldService->getField($id);
        return view('settings_menu.field.show', compact('field'));
    }

    public function edit(string $id)
    {
        $field = $this->fieldService->getField($id);
        $majors = $this->majorService->getAllMajors();
        return view('settings_menu.field.edit', compact('field', 'majors'));
    }


    public function update(FieldRequest $request, string $id)
    {
        $this->fieldService->updateField($id, $request->validated());
        return redirect()->route('index.field')->with('success', 'Cập nhật lĩnh vực thành công');
    }

    public function destroy(string $id)
    {
        $this->fieldService->deleteField($id);
        return redirect()->route('index.field')->with('success', 'Xóa lĩnh vực thành công');
    }

    public function deleteSubgroup(Request $request)
    {
        $this->fieldService->deleteSubgroup($request->field_id, $request->subgroup_id);
        return back()->with('success', 'Xóa nhóm con thành công');
    }
}
