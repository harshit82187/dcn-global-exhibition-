<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller

{

    public function list(){
        $services = Services::orderBy('created_at','desc')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create(){
        return view('admin.services.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $messages = [
            'name.required' => 'This service name is required.',
            'name.unique' => 'This service name is already exist. please try another name',
            'title.required' => 'This title is required.',
            'tab_title.required' => 'At least one tab title is required.',
            'tab_description.required' => 'At least one tab description is required.',
            'image.mimes' => 'This image must be a JPG, JPEG, or PNG.',
            'image.max' => 'This image size must not exceed 5MB.',
        ];
        $validated = $request->validate([
            'name' => 'required|string|unique:services,name',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'home_page_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'tab_title' => 'required|array',
            'tab_description' => 'required|array',
        ], $messages);

        $service_image = null;
        if($request->image != null){
            $file = $request->image;
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("app/service/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);  
            }
            $file->move($folderPath, $filename);
            $service_image = "app/service/{$year}/{$month}/" . $filename;
        }

        $home_page_image = null;
        if($request->home_page_img != null){
            $file = $request->home_page_img;
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("app/service/home-page{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);  
            }
            $file->move($folderPath, $filename);
            $home_page_image = "app/service/home-page{$year}/{$month}/" . $filename;
        }

        $tabs = [];
        foreach ($request->tab_title as $index => $title) {
            $tabs[] = [
                'title' => $title,
                'description' => $request->tab_description[$index] ?? ''
            ];
        }
        Services::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $service_image,
            'home_page_img' => $home_page_image,
            'tabs' => json_encode($tabs),
        ]);
        return redirect()->route('services')->with('success', 'Service saved successfully!');
    }

    // Show form to edit banner

    public function edit($id){
        $service = Services::findOrFail($id);
        $decodedTabs = json_decode($service->tabs,true);
        return view('admin.services.edit', compact('service','decodedTabs'));
    }

    public function update(Request $request, $id){
        // dd($request->all(),$id);
        $messages = [
            'name.required' => 'This service name is required.',
            'name.unique' => 'This service name already exists. Please try another name.',
            'title.required' => 'This title is required.',
            'tab_title.required' => 'At least one tab title is required.',
            'tab_description.required' => 'At least one tab description is required.',
            'image.mimes' => 'This image must be a JPG, JPEG, or PNG.',
            'image.max' => 'This image size must not exceed 5MB.',
        ];   

        $validated = $request->validate([
            'name' => 'required|string|unique:services,name,' . $id,
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'home_page_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'tab_title' => 'required|array',
            'tab_description' => 'required|array',
        ], $messages);

    
        $service_image = null;
        if ($request->image != null) {
            $file = $request->image;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("app/service/{$year}/{$month}");         
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }          
            $file->move($folderPath, $filename);
            $service_image = "app/service/{$year}/{$month}/" . $filename;
        }

        $home_page_image = null;
        if($request->home_page_img != null){
            $file = $request->home_page_img;
            $filename = time(). '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("app/service/home-page{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);  
            }
            $file->move($folderPath, $filename);
            $home_page_image = "app/service/home-page{$year}/{$month}/" . $filename;
        }

        $tabs = [];
        foreach ($request->tab_title as $index => $title) {
            $tabs[] = [
                'title' => $title,
                'description' => $request->tab_description[$index] ?? ''
            ];
        }   
        $service = Services::findOrFail($id);   
        $service->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $service_image ?: $service->image,
            'home_page_img' => $home_page_image,
            'tabs' => json_encode($tabs),
        ]);   
        return redirect()->route('services')->with('success', 'Service updated successfully!');
    }

    public function destroy($id){
        $blogs = Services::findOrFail($id);
        if (file_exists(public_path($blogs->upload_file))) {
            unlink(public_path($blogs->upload_file));
        }
        $blogs->delete();
        return redirect()->route('services')->with('success', 'Service deleted successfully.');
    }

}

