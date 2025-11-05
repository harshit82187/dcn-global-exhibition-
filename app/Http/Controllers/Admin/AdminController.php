<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Aboutbanner;
use App\Models\Blogs;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    // Show form to edit banner
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.admin_profile', compact('admin'));
    }

    public function update(Request $request)
    {
        // dd("fsdfsfdsf");
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // profile image validation
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update text fields
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Update password if entered
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        // Upload new profile image
        if ($request->hasFile('profile')) {
            // Delete old image
            if ($admin->profile && File::exists(public_path('uploads/admin/profile/' . $admin->profile))) {
                File::delete(public_path('uploads/admin/profile/' . $admin->profile));
            }

            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/profile/'), $imageName);

            $admin->profile = $imageName;
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }



    // Delete banner

}
