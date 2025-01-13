<?php

namespace App\Http\Controllers;

use App\Service\Setting\OrganizationService;
use App\Http\Requests\OrganizationRequest;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __construct(protected OrganizationService $organizationService)
    {
        //
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $organizations = $this->organizationService->getAllOrganizations($search);
        return view('settings_menu.organization.index', compact('organizations', 'search'));
    }

    public function create()
    {
        return view('settings_menu.organization.create');
    }

    public function store(OrganizationRequest $request)
    {
        $this->organizationService->createOrganization($request->validated());
        return redirect()->route('index.organization')->with('success', 'Thêm tổ chức thành công');
    }

    public function show(string $id)
    {
        $organization = $this->organizationService->getOrganization($id);
        return view('settings_menu.organization.show', compact('organization'));
    }


    public function edit(string $id)
    {
        $organization = $this->organizationService->getOrganization($id);
        return view('settings_menu.organization.edit', compact('organization'));
    }

    public function update(OrganizationRequest $request, string $id)
    {
        $this->organizationService->updateOrganization($id, $request->validated());
        return redirect()->route('index.organization')->with('success', 'Cập nhật tổ chức thành công');
    }

    public function destroy(string $id)
    {
        $this->organizationService->deleteOrganization($id);
        return redirect()->route('index.organization')->with('success', 'Xóa tổ chức thành công');
    }
}
