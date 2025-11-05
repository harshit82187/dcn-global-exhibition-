<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Brand;

class BrandController extends Controller
{
    // Show all banners
    public function list()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    // Show form to create a new banner
    public function create()
    {
        return view('admin.brand.add');
    }

    // Store new banner
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',

            'image' => 'required|image|mimes:jpg,jpeg,svg,png,webp,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/brand'), $imageName);

        Brand::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('brand')->with('success', 'Brand created successfully.');
    }

    // Show form to edit banner
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    // Update banner
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $banner = Brand::findOrFail($id);

        // Handle file upload if a new file is provided
        if ($request->hasFile('image')) {
            // Delete old file if exists
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/brand'), $imageName);
            $banner->image = $imageName;
        }

        // Update other fields
        $banner->name = $request->name;


        $banner->save();

        return redirect()->route('brand')->with('success', 'Brand updated successfully.');
    }


    // Delete banner
    public function destroy($id)
    {
        $banner = Brand::findOrFail($id);

        // Optional: delete the image file
        if (file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $banner->delete();

        return redirect()->route('brand')->with('success', 'Brand deleted successfully.');
    }
}
