<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Service\ClubService;
use App\Models\Major;
use App\Models\Market;
use App\Models\Field;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function __construct(
        protected ClubService $clubService
    ) {}

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'field_id', 'market_id']);
        $clubs = $this->clubService->getAllClubs($filters);
        $fields = Field::all();
        $markets = Market::all();

        return view('club.index', compact('clubs', 'fields', 'markets', 'filters'));
    }

    public function create()
    {
        $majors = Major::all();
        $markets = Market::all();
        return view('club.create', compact('majors', 'markets'));
    }

    public function store(ClubRequest $request)
    {
        $this->clubService->createClub($request->validated());
        return redirect()->route('index.club')->with('success', 'Thêm câu lạc bộ thành công');
    }

    public function show(string $id)
    {
        $club = $this->clubService->getClubById($id);
        return view('club.show', compact('club'));
    }

    public function edit(string $id)
    {
        $club = $this->clubService->getClubById($id);
        $majors = Major::all();
        $markets = Market::all();
        return view('club.edit', compact('club', 'majors', 'markets'));
    }

    public function update(ClubRequest $request, string $id)
    {
        try {
            $this->clubService->updateClub($id, $request->validated());
            return redirect()->route('index.club')->with('success', 'Cập nhật câu lạc bộ thành công');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->clubService->deleteClub($id);
            return redirect()->route('index.club')->with('success', 'Xóa câu lạc bộ thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Có lỗi xảy ra khi xóa câu lạc bộ']);
        }
    }

    public function getFieldsByMajor($majorId)
    {
        $fields = \App\Models\Field::where('major_id', $majorId)->get(['id', 'field_name']);
        return response()->json($fields);
    }
}
