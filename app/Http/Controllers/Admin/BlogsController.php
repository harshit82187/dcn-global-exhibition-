<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Aboutbanner;
use App\Models\Blogs;

class BlogsController extends Controller
{
    // Show all banners
    public function list()
    {
        $blogs = Blogs::all();
        return view('admin.blogs.list', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.add');
    }


    public function store(Request $request)
    {

        // Validate form inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    // Check for 'summer' in description
                    if (stripos($value, 'summer') !== false) {
                        $fail('The description should not contain the word "summer".');
                    }

                    // Check for URLs in description
                    if (preg_match('/(?:https?:\/\/[^\s]+|www\.[^\s]+)/', $value)) {
                        $fail('The description should not contain links.');
                    }
                }
            ],
            'upload_file' => 'nullable|image|mimes:jpeg,webp,png,jpg|max:2048',
        ]);

        // Handle file upload if an image is provided
        $filePath = null;  // Default to null in case no file is uploaded
        if ($request->hasFile('upload_file')) {
            // Get the uploaded file
            $file = $request->file('upload_file');

            // Generate a unique file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the file in the public folder
            $filePath = $fileName;
            $file->move(public_path('blogs'), $fileName);  // Move the file to the public/uploads folder
        }

        // Create a new Banner record in the database
        $banner = new Blogs();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->image = $filePath;  // Save the file path to the database
        $banner->save();  // Save the banner record

        // Redirect to the desired page with a success message
        return redirect()->route('blogs')->with('success', 'bloges created successfully!');
    }



    // Show form to edit banner
    public function edit($id)
    {
        $blogs = Blogs::findOrFail($id);
        return view('admin.blogs.edit', compact('blogs'));
    }


    public function update(Request $request, $id)
    {
        // Find the blog by ID
        $blog = Blogs::findOrFail($id);

        // Validate form inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    if (stripos($value, 'summer') !== false) {
                        $fail('The description should not contain the word "summer".');
                    }
                    if (preg_match('/(?:https?:\/\/[^\s]+|www\.[^\s]+)/', $value)) {
                        $fail('The description should not contain links.');
                    }
                }
            ],
            'upload_file' => 'nullable|image|mimes:jpeg,webp,png,jpg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('upload_file')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path('blogs/' . $blog->image))) {
                unlink(public_path('blogs/' . $blog->image));
            }

            $file = $request->file('upload_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('blogs'), $fileName);
            $blog->image = $fileName;
        }

        // Update other fields
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->save();

        return redirect()->route('blogs')->with('success', 'Blog updated successfully!');
    }



    // Delete banner
    public function destroy($id)
    {
        $blogs = Blogs::findOrFail($id);

        // Optional: delete the image file
        if (file_exists(public_path($blogs->image))) {
            unlink(public_path($blogs->image));
        }

        $blogs->delete();

        return redirect()->route('blogs')->with('success', 'blogs deleted successfully.');
    }
}
