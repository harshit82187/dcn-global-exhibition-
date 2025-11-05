<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    // Show all banners
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    // Show form to create a new banner
    public function create()
    {
        return view('admin.banner.create');
    }

    // Store new banner
    public function store(Request $request)
    {

        $bannerCount = Banner::count();

        if ($bannerCount >= 3) {
            return redirect()->route('banner.index')->with('error', 'Only three banners allowed hain.');
        }


        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'upload_file' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
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
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    // Update banner
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'upload_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        // Handle file upload if a new file is provided
        if ($request->hasFile('upload_file')) {
            // Delete old file if exists
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $imageName = time() . '.' . $request->upload_file->extension();
            $request->upload_file->move(public_path('uploads/banners'), $imageName);
            $banner->image = 'uploads/banners/' . $imageName;
        }

        // Update other fields
        $banner->title = $request->title;
        $banner->heading = $request->heading;
        $banner->description = $request->description;

        $banner->save();

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
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
