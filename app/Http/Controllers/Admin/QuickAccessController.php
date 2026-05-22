<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuickAccess;
use Illuminate\Http\Request;

class QuickAccessController extends Controller
{
    public function index()
    {
        $items = QuickAccess::orderBy('order')->get();

        return view('admin.quick-access.index', compact('items'));
    }

    public function create()
    {
        return view('admin.quick-access.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        QuickAccess::create([
            'title' => $request->title,
            'url' => $request->url,
            'icon' => $request->icon,
            'bg_color' => $request->bg_color,
            'text_color' => $request->text_color,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.quick-access.index')
            ->with('success', 'Quick Access berhasil ditambahkan');
    }

    public function edit(QuickAccess $quickAccess)
    {
        return view('admin.quick-access.edit', compact('quickAccess'));
    }

    public function update(Request $request, QuickAccess $quickAccess)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $quickAccess->update([
            'title' => $request->title,
            'url' => $request->url,
            'icon' => $request->icon,
            'bg_color' => $request->bg_color,
            'text_color' => $request->text_color,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.quick-access.index')
            ->with('success', 'Quick Access berhasil diupdate');
    }

    public function destroy(QuickAccess $quickAccess)
    {
        $quickAccess->delete();

        return back()->with('success', 'Quick Access berhasil dihapus');
    }
}