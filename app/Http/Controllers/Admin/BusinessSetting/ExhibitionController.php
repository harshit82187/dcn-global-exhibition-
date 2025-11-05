<?php



namespace App\Http\Controllers\Admin\BusinessSetting;



use App\Http\Controllers\Controller;



use App\Models\Exhibition;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;

use Str;



class ExhibitionController extends Controller

{



    public function index()

    {

        $exhibitions = Exhibition::orderBy('id','desc')->paginate(10);

        return view('admin.exhibition.list', compact('exhibitions'));

    }



    public function create(){

        return view('admin.exhibition.add');

    }



    public function store(Request $request){

        // dd($request->all());

        $messages = [

            'title.unique' => 'This name is already exist. please try another name',

            'title.required' => 'title field is mandatory.',

            'title.string' => 'title must be a valid string.',           

            'name.required' => 'name information is required.',

            'area.required' => 'area must be a required.',         

            'image.required' => 'image field is required.',

            'image.image' => 'image must be a valid image file.',

            'image.mimes' => 'image must be in one of the following formats: jpg, jpeg, png.',

            'image.max' => 'image size must not exceed 5MB.',          

            'ex_image.required' => 'gallery field is required.',

            'ex_image.image' => 'gallery image must be a valid image file.',

            'ex_image.mimes' => 'gallery image must be in one of the following formats: jpg, jpeg, png.',

            'ex_image.max' => 'gallery image size must not exceed 5MB.',

        ];

        $validated = $request->validate([

            'title' => 'required|string|unique:exhibitions,title',

            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',

            'name' => 'required|array',

            'area' => 'required|array',

            'ex_image' => 'required|array',

            'ex_image.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',

            

        ], $messages);



        $imagePath  = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $year = now()->year;

            $month = now()->format('M');

            $folderPath = public_path("app/exhibitions/image/{$year}/{$month}");

            if (!file_exists($folderPath)) {

                mkdir($folderPath, 0777, true);  

            }

            $file->move($folderPath, $filename);

            $imagePath  = "app/exhibitions/image/{$year}/{$month}/" . $filename;

        }

        $ex_image = null;

        if ($request->hasFile('ex_image')) {

            $uploadedFiles = $request->file('ex_image'); 

            $images = [];

            foreach ($uploadedFiles as $file) {

                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                $year = now()->year;

                $month = now()->format('M');

                $folderPath = public_path("app/exhibitions/ex-image/{$year}/{$month}");

                if (!file_exists($folderPath)) {

                    mkdir($folderPath, 0777, true);

                }

                $file->move($folderPath, $filename);

                $images[] = "app/exhibitions/ex-image/{$year}/{$month}/" . $filename;

            }

            $ex_image = json_encode($images);

        }

        Exhibition::create([

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'image' => $imagePath ,  

            'infos' => json_encode([

                'name' => $request->name,

                'area' => $request->area,

                'ex_image' => $ex_image,

            ]),

            'status' => 1, 

        ]);

        return redirect('admin/exhibitions')->with('success', 'Exhibition added successfully!');

    }



    public function edit($id){

        $exhibition = Exhibition::findOrFail($id);

        return view('admin.exhibition.edit', compact('exhibition'));

    }



    public function update(Request $request, $id)

    {

        // dd($request->all());

        $exhibition = Exhibition::findOrFail($id);

        $messages = [

            'title.unique' => 'This name already exists. Please try another name',

            'title.required' => 'Title field is mandatory.',

            'title.string' => 'Title must be a valid string.',

            'name.required' => 'Name information is required.',

            'area.required' => 'Area is required.',

            'image.image' => 'Image must be a valid image file.',

            'image.mimes' => 'Image must be in one of the following formats: jpg, jpeg, png.',

            'image.max' => 'Image size must not exceed 5MB.',

            'ex_image.*.image' => 'Each Exhibition image must be valid.',

            'ex_image.max' => 'Exhibition Image size must not exceed 5MB.',

            

        ];

        $validated = $request->validate([

            'title' => 'required|string|unique:exhibitions,title,' . $id,

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',

            'name' => 'required|array',

            'area' => 'required|array',

            'ex_image' => 'nullable|array',

            'ex_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'old_ex_image' => 'nullable|array',

        ], $messages);



        if ($request->hasFile('image')) {

            if ($exhibition->image && file_exists(public_path($exhibition->image))) {

                unlink(public_path($exhibition->image));

            }

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $year = now()->year;

            $month = now()->format('M');

            $folderPath = public_path("app/exhibitions/image/{$year}/{$month}");

            if (!file_exists($folderPath)) {

                mkdir($folderPath, 0777, true);

            }

            $file->move($folderPath, $filename);

            $imagePath = "app/exhibitions/image/{$year}/{$month}/" . $filename;

        } else {

            $imagePath = $exhibition->image; 

        }



        $names = $request->name;

        $newImages = $request->file('ex_image') ?? [];

        $oldImages = $request->old_ex_image ?? [];

        $finalImages = [];

        foreach ($names as $index => $val) {

            if (!empty($newImages[$index])) {

                $file = $newImages[$index];

                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                $folderPath = public_path("app/exhibitions/ex-image/" . now()->year . '/' . now()->format('M'));

                if (!file_exists($folderPath)) {

                    mkdir($folderPath, 0777, true);

                }

                $file->move($folderPath, $filename);

                $finalImages[] = "app/exhibitions/ex-image/" . now()->year . '/' . now()->format('M') . '/' . $filename;

            } elseif (!empty($oldImages[$index])) {

                $finalImages[] = $oldImages[$index];

            } else {

                $finalImages[] = null;

            }

        }





        $exhibition->update([

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'image' => $imagePath,

            'infos' => json_encode([

                'name' => $request->name,

                'area' => $request->area,

                'ex_image' => json_encode($finalImages),

            ]),

        ]);

        return redirect('admin/exhibitions')->with('success', 'Exhibition updated successfully!');

    }





    public function destroy($id){

        // dd($id);

        $exhibition = Exhibition::findOrFail($id);

        $exhibition->delete();

        return back()->with('error','Exhibition  Delete Successfully!');

    }



      public function exhibitionStatusChange(Request $request)

    {

        // dd($request->all());

        $request->validate([

            'exhibition_id' => 'required|numeric',  

            'status' => 'required|boolean',  

        ]);    

    

        try {

            $exhibition = Exhibition::findOrFail($request->exhibition_id);

            $exhibition->status = $request->status;

    

            if ($exhibition->save()) {

                return response()->json([

                    'success' => true,

                    'message' => 'Exhibition status updated successfully',

                ]);

            } else {

                return response()->json([

                    'success' => false,

                    'message' => 'Failed to update Exhibition status.',

                ], 500);

            }

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => 'Something went wrong: ' . $e->getMessage(),

            ], 500);

        }

    }





}

