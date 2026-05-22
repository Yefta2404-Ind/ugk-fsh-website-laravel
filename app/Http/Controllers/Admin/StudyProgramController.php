<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudyProgramController extends Controller
{
    public function index()
    {
        $studyPrograms = StudyProgram::latest()->get();

        return view('admin.study-programs.index', compact('studyPrograms'));
    }

    public function create()
    {
        return view('admin.study-programs.create');
    }

public function store(Request $request)
{
    StudyProgram::create([
        'name' => $request->name,

        'slug' => Str::slug($request->name),
        'website' => $request->website,

        'short_name' => $request->short_name,
        'description' => $request->description,
        'accreditation' => $request->accreditation,
        'head_of_program' => $request->head_of_program,
        'students_count' => $request->students_count,
    ]);

    return redirect()->route('admin.study-programs.index');
}

    public function edit(StudyProgram $study_program)
{
    return view('admin.study-programs.edit', compact('study_program'));
}

public function update(Request $request, StudyProgram $study_program)
{
    $study_program->update([
        'name' => $request->name,

        'slug' => Str::slug($request->name),
        'website' => $request->website,

        'short_name' => $request->short_name,
        'description' => $request->description,
        'accreditation' => $request->accreditation,
        'head_of_program' => $request->head_of_program,
        'students_count' => $request->students_count,
    ]);

    return redirect()->route('admin.study-programs.index');
}

public function show(StudyProgram $study_program)
{
    return redirect()->route('admin.study-programs.index');
}

public function destroy(StudyProgram $study_program)
{
    $study_program->delete();

    return redirect()
        ->route('admin.study-programs.index')
        ->with('success', 'Program studi berhasil dihapus');
}

}