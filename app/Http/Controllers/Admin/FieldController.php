<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FieldController extends Controller
{
    public function index()
    {
        $rows = Field::with(['images', 'videos'])->get();
        $route = 'admin.fields';
        return view('admin.fields.index', compact('rows','route'));
    }

    public function create()
    {
        return view('admin.fields.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
            'videos.*' => 'nullable|mimes:mp4,avi,mov|max:10240',
        ]);

        $field = Field::create($request->only('title_ar', 'title_en', 'description_ar', 'description_en'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('fields/images', 'public');
                $field->images()->create(['image_path' => $path]);
            }
        }

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store('fields/videos', 'public');
                $field->videos()->create(['video_path' => $path]);
            }
        }

        return redirect()->route('admin.fields.index')->with('success', 'Field created successfully.');
    }

    public function edit($id)
    {
        $row = Field::find($id);
        return view('admin.fields.edit', compact('row'));
    }

    public function update(Request $request, Field $field)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
            'videos.*' => 'nullable|mimes:mp4,avi,mov|max:10240',
        ]);

        $field->update($request->only('title_ar', 'title_en', 'description_ar', 'description_en'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('fields/images', 'public');
                $field->images()->create(['image_path' => $path]);
            }
        }

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store('fields/videos', 'public');
                $field->videos()->create(['video_path' => $path]);
            }
        }

        return redirect()->route('admin.fields.index')->with('success', 'Field updated successfully.');
    }

    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('admin.fields.index')->with('success', 'Field deleted successfully.');
    }

    public function show($id )
    {
        $row = Field::find($id);
        return view('admin.fields.show', compact('row'));
    }
}
