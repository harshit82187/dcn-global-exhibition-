<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactDetailController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the contact details.
     */
    public function index()
    {
        $contacts = ContactDetail::all();
        return view('admin.contact_details.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new contact detail.
     */
    public function create()
    {
        return view('admin.contact_details.create');
    }

    /**
     * Store a newly created contact detail in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_nos.*' => 'required|numeric',
            'addresses.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ContactDetail::create([
            'phone_nos' => $request->phone_nos ?? [],
            'addresses' => $request->addresses ?? [],
        ]);

        return redirect()->route('admin.contact-details.index')->with('success', 'Contact detail created successfully');
    }

    /**
     * Display the specified contact detail.
     */
    public function show($id)
    {
        $contact = ContactDetail::findOrFail($id);
        return view('contact_details.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact detail.
     */
    public function edit($id)
    {
        $contact = ContactDetail::findOrFail($id);
        return view('admin.contact_details.edit', compact('contact'));
    }

    /**
     * Update the specified contact detail in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = ContactDetail::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'phone_nos.*' => 'required',
            'addresses.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact->update([
            'phone_nos' => $request->phone_nos ?? $contact->phone_nos,
            'addresses' => $request->addresses ?? $contact->addresses,
        ]);

        return redirect()->route('contact_details.index')->with('success', 'Contact detail updated successfully');
    }

    /**
     * Remove the specified contact detail from storage.
     */
    public function destroy($id)
    {
        $contact = ContactDetail::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact-details_index')->with('success', 'Contact detail deleted successfully');
    }
}