<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Aboutbanner;
use App\Models\Blogs;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    // Show all banners
    public function list(){
        $portfolio = Portfolio::orderBy('id','desc')->paginate(10);
        return view('admin.portfolio.list', compact('portfolio'));
    }

    public function create(){
        return view('admin.portfolio.add');
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,webp,png,jpg|max:2048',
            'files.*' => 'required|image|mimes:jpeg,webp,png,jpg|max:2048',
            // 'video' => 'nullable|mimetypes:video/mp4,video/x-matroska|max:5120',
            'video' => 'nullable|mimes:mp4,mkv,webm,avi|max:102400',
            'priority' => 'required|numeric|unique:portfolio,priority',
        ]);

        $filePath = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("portfolio-images/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file->move($folderPath, $filename);
            $filePath = "portfolio-images/{$year}/{$month}/" . $filename;
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $file = $request->video;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("portfolio-video/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file->move($folderPath, $filename);
            $videoPath = "portfolio-video/{$year}/{$month}/" . $filename;
        }

        // Handle multiple image uploads
        $images = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $year = now()->year;
                $month = now()->format('M');
                $folderPath = public_path("portfolio-files/{$year}/{$month}");

                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                $file->move($folderPath, $filename);
                $images[] = "portfolio-files/{$year}/{$month}/" . $filename;
            }
        }
        $portfolio = new Portfolio();
        $portfolio->name = $request->name;
        $portfolio->year = $request->year;
        $portfolio->image = $filePath;
        $portfolio->video = $videoPath;
        $portfolio->priority = $request->priority;
        $portfolio->files = json_encode($images);
        $portfolio->save();

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio created successfully!');
    }

    // Show form to edit banner
    public function edit($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

   public function update(Request $request, $id){
        $portfolio = Portfolio::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg|max:2048',
            'files.*' => 'nullable|image|mimes:jpeg,webp,png,jpg|max:2048',
            // 'video' => 'nullable|mimetypes:video/mp4,video/x-matroska|max:5120',
            'video' => 'nullable|mimes:mp4,mkv,video/x-matroska,webm,avi|max:102400',
            'priority' => 'required|numeric|unique:portfolio,priority,' .$id,
        ]);

        $year = now()->year;
        $month = now()->format('M');
        $filePath = $portfolio->image;
        if ($request->hasFile('image')) {
            if ($portfolio->image && file_exists(public_path($portfolio->image))) {
                unlink(public_path($portfolio->image));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folderPath = public_path("portfolio-images/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file->move($folderPath, $filename);
            $filePath = "portfolio-images/{$year}/{$month}/" . $filename;
        }

        $videoPath = $portfolio->video;
        if ($request->hasFile('video')) {
            if ($portfolio->video && file_exists(public_path($portfolio->video))) {
                unlink(public_path($portfolio->video));
            }
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folderPath = public_path("portfolio-video/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file->move($folderPath, $filename);
            $videoPath = "portfolio-video/{$year}/{$month}/" . $filename;
        }

        $images = json_decode($portfolio->files ?? '[]', true);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $folderPath = public_path("portfolio-files/{$year}/{$month}");
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file->move($folderPath, $filename);
                $images[] = "portfolio-files/{$year}/{$month}/" . $filename;
            }
        }
        $portfolio->name = $request->name;
        $portfolio->year = $request->year;
        $portfolio->image = $filePath;
        $portfolio->video = $videoPath;
        $portfolio->priority = $request->priority;
        $portfolio->files = json_encode($images);
        $portfolio->save();
        return redirect()->route('admin.portfolio')->with('success', 'Portfolio updated successfully!');
    }






    // Delete banner
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if ($portfolio->image && file_exists(public_path($portfolio->image))) {
            unlink(public_path($portfolio->image));
        }
        $files = json_decode($portfolio->files ?? '[]', true);
            foreach ($files as $filePath) {
                    if ($filePath && file_exists(public_path($filePath))) {
                        unlink(public_path($filePath));
                    }
            }
        $portfolio->delete();
        return redirect()->route('admin.portfolio')->with('error', 'Portfolio deleted successfully.');
    }
}
