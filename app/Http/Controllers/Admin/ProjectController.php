<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Level;
use App\Models\ProjectImage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('level', 'images')->latest()->paginate(10);
        $route = 'admin.projects';
        return view('admin.projects.index', compact('projects','route'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.projects.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|exists:levels,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $project = Project::create($request->only('level_id', 'title_ar', 'title_en', 'description_ar', 'description_en'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $project->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully');
    }

    public function show(Project $project)
    {
        $project->load('level', 'images');
        return view('admin.projects.show', compact('project'));
    }

    public function edit( $id)
    {
        $levels = Level::all();
        $row= Project::find($id);
        $route = 'admin.projects';
        return view('admin.projects.edit', compact('row', 'levels','route'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'level_id' => 'required|exists:levels,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $project->update($request->only('level_id', 'title_ar', 'title_en', 'description_ar', 'description_en'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $project->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }

    // Delete individual image
    public function deleteImage(ProjectImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image deleted successfully');
    }
}
