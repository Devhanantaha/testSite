<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Country;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::with('country')->paginate(20);
        $route = 'admin.levels';
        return view('admin.levels.index', compact('levels','route'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.levels.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

            'country_id' => 'required|exists:countries,id',
        ]);

        Level::create($request->all());

        return redirect()->route('admin.levels.index')->with('success', 'Level created successfully.');
    }

    public function edit(Level $level)
    {
        $countries = Country::all();
        return view('admin.levels.edit', compact('level', 'countries'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',

            'name_en' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $level->update($request->all());

        return redirect()->route('admin.levels.index')->with('success', 'Level updated successfully.');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('admin.levels.index')->with('success', 'Level deleted successfully.');
    }

    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }
}
