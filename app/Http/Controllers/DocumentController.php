<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('media')->latest()->get();
        return view('document.index', compact('documents'));
        dd($documents);
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|file'
        ]);

        $document = Document::create([
            'name' => $request->file('document')->getClientOriginalName()
        ]);

        $document->addMediaFromRequest('document')
            ->toMediaCollection('documents');

        return back()->with('success', 'Tài liệu đã được tải lên thành công!');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->clearMediaCollection('documents');
        $document->delete();

        return back()->with('success', 'Tài liệu đã được xoá!');
    }
    public function download($id)
    {
        $document = Document::findOrFail($id);
        $media = $document->getFirstMedia('documents');

        if ($media) {
            return response()->download($media->getPath(), $media->file_name);
        }

        return back()->with('error', 'Tài liệu không tồn tại!');
    }
}
