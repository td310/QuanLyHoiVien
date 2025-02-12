<?php

namespace App\Http\Controllers;

use App\Service\RoleService;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService)
    {
        //
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->createRole($request->validated());
        return redirect()->route('index.role')
            ->with('success', 'Tạo vai trò thành công');
    }

    public function show(string $id)
    {
        $data = $this->roleService->getRoleById($id);
        return view('role.show', $data);
    }

    public function edit(string $id)
    {
        $data = $this->roleService->getRoleById($id);
        return view('role.edit', $data);
    }
    
    public function update(RoleRequest $request, string $id)
    {
        try {
            $this->roleService->updateRole($id, $request->validated());
            return redirect()->route('index.role')
                ->with('success', 'Cập nhật vai trò thành công');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function destroy(string $id) {}
}
