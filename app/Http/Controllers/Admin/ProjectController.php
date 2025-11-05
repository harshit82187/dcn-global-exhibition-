<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Aboutbanner;
use App\Models\Blogs;
use App\Models\Project;

class ProjectController extends Controller
{
    // Show all banners
    public function list(){
        $project = Project::all();
        return view('admin.project.index', compact('project'));
    }

    public function create(){
        return view('admin.project.add');
    }


    public function store(Request $request){
        $request->validate([
            'project_year' => 'required|numeric',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif,svg,webp|max:2048',           
        ]);

        // Handle Image Upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/projects'), $imageName);
        }    

        // Save to database
        Project::create([
            'project_year' => $request->project_year,
            'location' => $request->location,
            'image' => $imageName,
        ]);
        return redirect()->route('project')->with('success', 'Project Added Successfully!');
    }

    // Show form to edit banner
    public function edit($id){
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'project_year' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $project = Project::findOrFail($id);
        $project->project_year = $request->project_year;
        $project->location = $request->location;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/projects'), $name);
            $project->image = $name;
        }
        $project->save();
        return redirect()->route('project')->with('success', 'Project updated successfully!');
    }




    // Delete banner
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Optional: delete the image file
        if (file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return redirect()->route('project')->with('success', 'project deleted successfully.');
    }
}
