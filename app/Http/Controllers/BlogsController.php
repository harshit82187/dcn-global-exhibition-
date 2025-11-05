<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Aboutbanner;

class BlogsController extends Controller
{
    // Show all banners
    public function list()
    {
        $banners = Aboutbanner::all();
        return view('admin.blogs.list', compact('banners'));
    }

   

    // Store new banner
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'upload_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->upload_file->extension();
        $request->upload_file->move(public_path('uploads/banners'), $imageName);

        Banner::create([
            'title' => $request->title,
            'heading' => $request->heading,
            'description' => $request->description,
            'image' => 'uploads/banners/' . $imageName,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully.');
    }




    // Show form to edit banner
    public function edit($id)
    {
        $banner = Aboutbanner::findOrFail($id);
        return view('admin.aboutbanner.edit', compact('banner'));
    }



    public function update(Request $request, $id)
    {
        $banner = Aboutbanner::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'upload_file.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // For each image
        ]);

        $data = $request->only(['title', 'heading', 'description']);

        // Store multiple images
        if ($request->hasFile('upload_file')) {
            $uploadedImages = [];

            foreach ($request->file('upload_file') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/banners'), $imageName);
                $uploadedImages[] = 'uploads/banners/' . $imageName;
            }

            // Save image paths as JSON
            // $data['image'] = json_encode($uploadedImages);
            $data['image'] = json_encode($uploadedImages, JSON_UNESCAPED_SLASHES);
        }

        $banner->update($data);

        return redirect()->route('abouts.banner')->with('success', 'Aboutsbanner updated successfully.');
    }


    // Delete banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Optional: delete the image file
        if (file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
    }
}
