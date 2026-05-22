<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Page;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with([
            'childrenRecursive',
            'page',
            'parent'
        ])->get();

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $pages = Page::where('status', 'published')->get();

        // ✅ FIX: wajib eager load recursive
        $parents = Menu::with('childrenRecursive')
            ->whereNull('parent_id')
            ->get();

        return view('admin.menus.create', compact('pages', 'parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'url'     => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order'   => 'nullable|integer|min:0',
        ]);

        Menu::create([
            'title'     => $request->title,
            'page_id'   => $request->page_id ?: null,
            'url'       => $request->url ?: null,
            'parent_id' => $request->parent_id ?: null,
            'order'     => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        // ✅ FIX: eager load + exclude diri sendiri
        $parents = Menu::with('childrenRecursive')
            ->whereNull('parent_id')
            ->where('id', '!=', $menu->id)
            ->get();

        return view('admin.menus.edit', compact('menu', 'parents'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'url'     => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order'   => 'nullable|integer|min:0',
        ]);

        // ⚠️ Optional: cegah parent ke diri sendiri
        if ($request->parent_id == $menu->id) {
            return back()->withErrors([
                'parent_id' => 'Menu tidak bisa menjadi parent dirinya sendiri'
            ]);
        }

        $menu->update([
            'title'     => $request->title,
            'page_id'   => $request->page_id ?: null,
            'url'       => $request->url ?: null,
            'parent_id' => $request->parent_id ?: null,
            'order'     => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menu berhasil diupdate');
    }

    public function destroy(Menu $menu)
    {
        $title = $menu->title;

        // asumsi sudah ada method recursive delete
        $menu->deleteWithChildren();

        return redirect()
            ->route('admin.menus.index')
            ->with('success', "Menu \"{$title}\" dan semua sub-menu berhasil dihapus.");
    }

    /**
     * Toggle aktif/nonaktif via AJAX
     */
    public function toggle(Request $request, Menu $menu)
    {
        $menu->update([
            'is_active' => $request->boolean('is_active'),
        ]);

        return response()->json([
            'success'   => true,
            'title'     => $menu->title,
            'is_active' => $menu->is_active,
        ]);
    }

    /**
     * Reorder menu
     */
    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            Menu::where('id', $id)->update([
                'order' => $index + 1
            ]);
        }

        return response()->json(['success' => true]);
    }
}