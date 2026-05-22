<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeanProfile;
use Illuminate\Http\Request;

class DeanProfileController extends Controller
{
    public function edit()
    {
        $dean = DeanProfile::first();

        return view('admin.dean.edit', compact('dean'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'photo' => 'nullable|image'
        ]);

        $dean = DeanProfile::first();

        if (!$dean) {
            $dean = new DeanProfile();
        }

        $dean->name = $request->name;
        $dean->message = $request->message;

        if ($request->hasFile('photo')) {
            $dean->photo = $request->file('photo')
                ->store('dean', 'public');
        }

        $dean->save();

        return back()->with('success', 'Data berhasil diupdate');
    }
}