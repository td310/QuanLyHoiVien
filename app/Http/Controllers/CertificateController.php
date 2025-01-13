<?php

namespace App\Http\Controllers;

use App\Service\Setting\CertificateService;
use App\Http\Requests\CertificateRequest;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function __construct(protected CertificateService $certificateService)
    {
        //
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $certificates = $this->certificateService->getAllCertificates($search);
        return view('settings_menu.certificate.index', compact('certificates', 'search'));
    }

    public function create()
    {
        return view('settings_menu.certificate.create');
    }

    public function store(CertificateRequest $request)
    {
        $this->certificateService->createCertificate($request->validated());
        return redirect()->route('index.certificate')->with('success', 'Thêm chứng chỉ thành công');
    }

    public function show(string $id)
    {
        $certificate = $this->certificateService->getCertificate($id);
        return view('settings_menu.certificate.show', compact('certificate'));
    }


    public function edit(string $id)
    {
        $certificate = $this->certificateService->getCertificate($id);
        return view('settings_menu.certificate.edit', compact('certificate'));
    }

    public function update(CertificateRequest $request, string $id)
    {
        $this->certificateService->updateCertificate($id, $request->validated());
        return redirect()->route('index.certificate')->with('success', 'Cập nhật chứng chỉ thành công');
    }

    public function destroy(string $id)
    {
        $this->certificateService->deleteCertificate($id);
        return redirect()->route('index.certificate')->with('success', 'Xóa chứng chỉ thành công');
    }
}
