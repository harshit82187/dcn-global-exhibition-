<?php
namespace App\Http\Controllers\Admin;
use App\Models\Slider;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $banners = Slider::all();
        // dd($banners);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,tif,webp',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/banners'), $imageName);

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => 'uploads/banners/'.$imageName,
        ]);

        return redirect()->route('banners.index')->with('success', 'Banner added successfully');
    }

    public function edit(Slider $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Slider $banner)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,tif,gif,webp',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/banners'), $imageName);
            $banner->image = 'uploads/banners/'.$imageName;
        }

        $banner->update($request->except('image') + ['image' => $banner->image]);

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    public function destroy(Slider $banner)
    {
        if (file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
    }
}
