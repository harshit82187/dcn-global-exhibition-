<?php

namespace App\Http\Controllers\Admin\BusinessSetting;

use App\Http\Controllers\Controller;

use App\Models\GlobalPresence;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Str;

class GlobalPresenceController extends Controller
{

    public function index()
    {
        $global_presences = GlobalPresence::orderBy('id','desc')->paginate(10);
        return view('admin.global-presence.list', compact('global_presences'));
    }

    public function add(){
        return view('admin.global-presence.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $messages = [
            'name.required' => 'name field is mandatory.',
            'name.string' => 'name must be a valid string.',
            'name.unique' => 'This Gloabl Presence name is already exist. please try another name',
            'title.required' => 'title field is mandatory.',
            'title.string' => 'title must be a valid string.',           
            'description.required' => 'description field is mandatory.',
            'description.string' => 'description must be a valid string.',          
            'latest_work_info.required' => 'latest work information is required.',
            'latest_work_info.string' => 'latest work information must be a valid string.',         
            'image.nullable' => 'image field is optional.',
            'image.image' => 'image must be a valid image file.',
            'image.mimes' => 'image must be in one of the following formats: jpg, jpeg, png.',
            'image.max' => 'image size must not exceed 2MB.',          
            'gallery.nullable' => 'gallery field is optional.',
            'gallery.image' => 'gallery image must be a valid image file.',
            'gallery.mimes' => 'gallery image must be in one of the following formats: jpg, jpeg, png.',
            'gallery.max' => 'gallery image size must not exceed 2MB.',
        ];
        $validated = $request->validate([
            'name' => 'required|string|unique:global_presences,name',
            'title' => 'required|string',
            'description' => 'required|string',
            'latest_work_info' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            
        ], $messages);

         $global_image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("app/global-presence/image/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);  
            }
            $file->move($folderPath, $filename);
            $global_image = "app/global-presence/image/{$year}/{$month}/" . $filename;
        }
        $gallery_image = null;
        if ($request->hasFile('gallery')) {
            $uploadedFiles = $request->file('gallery'); 
            $images = [];
            foreach ($uploadedFiles as $file) {
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $year = now()->year;
                $month = now()->format('M');
                $folderPath = public_path("app/global-presence/gallery/{$year}/{$month}");
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file->move($folderPath, $filename);
                $images[] = "app/global-presence/gallery/{$year}/{$month}/" . $filename;
            }
            $gallery_image = json_encode($images);
        }
        GlobalPresence::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'latest_work_info' => $request->latest_work_info,
            'image' => $global_image,  
            'gallery' => $gallery_image,  
            'status' => 1, 
        ]);
        return redirect()->route('admin.global-presence')->with('success', 'Global Presence Addedd Successfully!');
    }

    public function edit($id){
        $globalPresence = GlobalPresence::findOrFail($id);
        return view('admin.global-presence.edit', compact('globalPresence'));
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $messages = [
            'name.required' => 'name field is mandatory.',
            'name.string' => 'name must be a valid string.',
            'name.unique' => 'This Gloabl Presence name is already exist. please try another name',
            'title.required' => 'title field is mandatory.',
            'title.string' => 'title must be a valid string.',           
            'description.required' => 'description field is mandatory.',
            'description.string' => 'description must be a valid string.',          
            'latest_work_info.required' => 'latest work information is required.',
            'latest_work_info.string' => 'latest work information must be a valid string.',         
            'image.nullable' => 'image field is optional.',
            'image.image' => 'image must be a valid image file.',
            'image.mimes' => 'image must be in one of the following formats: jpg, jpeg, png.',
            'image.max' => 'image size must not exceed 2MB.',          
            'gallery.nullable' => 'gallery field is optional.',
            'gallery.image' => 'gallery image must be a valid image file.',
            'gallery.mimes' => 'gallery image must be in one of the following formats: jpg, jpeg, png.',
            'gallery.max' => 'gallery image size must not exceed 2MB.',
        ];
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:global_presences,name,' . $id,
            'title' => 'required|string',
            'description' => 'required|string',
            'latest_work_info' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            
        ], $messages);

        $presence = GlobalPresence::findOrFail($id);
        $presence->name = $request->name;
        $presence->title = $request->title;
        $presence->description = $request->description;
        $presence->latest_work_info = $request->latest_work_info;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $year = now()->year;
            $month = now()->format('M');
            $folderPath = public_path("app/global-presence/image/{$year}/{$month}");
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);  
            }
            $file->move($folderPath, $filename);
            $presence->image = "app/global-presence/image/{$year}/{$month}/" . $filename;
        }
        if ($request->hasFile('gallery')) {
            $uploadedFiles = $request->file('gallery'); 
            $images = [];
            foreach ($uploadedFiles as $file) {
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $year = now()->year;
                $month = now()->format('M');
                $folderPath = public_path("app/global-presence/gallery/{$year}/{$month}");
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file->move($folderPath, $filename);
                $images[] = "app/global-presence/gallery/{$year}/{$month}/" . $filename;
            }
            $presence->gallery  = json_encode($images);
        }
         $presence->save();
        return redirect()->route('admin.global-presence')->with('success', 'Global Presence Updated Successfully!');
    }

    public function delete($id){
        // dd($id);
        $globalPresence = GlobalPresence::findOrFail($id);
        $globalPresence->delete();
        return back()->with('error','Global Presence Delete Successfully!');
    }


}
