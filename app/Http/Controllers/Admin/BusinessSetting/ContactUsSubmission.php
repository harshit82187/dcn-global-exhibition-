<?php

namespace App\Http\Controllers\Admin\BusinessSetting;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Replies;
use App\Models\ContactInfo;
use App\Models\SentEmail;
use App\Utils\ViewPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReply; // We'll create this Mailable class next
use Illuminate\Support\Facades\Log;


class ContactUsSubmission extends Controller
{

    public function reply_user(Request $request, $id)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
        // Find the contact
        $contact = ContactUs::findOrFail($id);
        $logoUrl = asset('public/images/DCN-logo-w.png');

        // Send the email
        Mail::to($contact->email)->send(new ContactReply([
            'subject' => $request->subject,
            'message' => $request->message,
            'name' => $contact->name,
            'logoUrl' => $logoUrl,
        ]));

        // Log the sent email
        SentEmail::create([
            'contact_id' => $request->contact_id,
            'name' => $contact->name,
            'email' => $contact->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'logo_url' => $logoUrl,
            'sent_at' => now(),
        ]);

        // Return JSON success response
        return response()->json([
            'success' => true,
            'message' => 'Reply sent successfully!',
        ], 200);
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error sending reply email: ' . $e->getMessage());

        // Return JSON error response
        return response()->json([
            'success' => false,
            'message' => 'Failed to send reply. Please try again.',
        ], 500);
    }
}


    public function contactList(){
        $contactList = ContactUs::orderBy('created_at', 'desc')->paginate(20);
        return view(ViewPath::ADMIN_CONTACT_SUBMISSIONS, compact('contactList'));
    }

    public function destroy($id)
{
    $contact = ContactUs::findOrFail($id);

    $contact->delete();

    return redirect()->route('contact-list')->with('success', 'Contact deleted successfully.');
}

    public function replyView($id){
        $contact = ContactUs::where('id', $id)->first();
        $replies = Replies::where('contact_id', $id)->orderBy('created_at', 'asc')->get();
        return view(ViewPath::ADMIN_REPLY_VIEW, compact('contact', 'replies'));
    }

    public function reply(Request $request, $id)
    {
        // dd($request->all());
        $logoUrl = asset('assets/web-assets/images/email_logo.png');

        $reply = Replies::create([
            'message' => $request->message,
            'is_admin' => 1,
            'contact_id' => $id,
            'user_email' => $request->user_email,
            'subject' => $request->subject,

        ]);

        Mail::to($request->user_email)->send(new ContactReply([
            'subject' => $request->subject,
            'message' => $request->message,
            'name' => $request->name,
            'logoUrl' => $logoUrl, // Replace with your logo URL
        ]));

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'reply' => $reply
            ]);
        }

        return back()->with('success', 'Reply sent successfully');
    }

    public function edit()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact.edit', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'website_url' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address1' => 'nullable',
            'map1' => 'nullable',
            'map2' => 'nullable',
            'address2' => 'nullable',

        ]);

        ContactInfo::updateOrCreate([], $request->all());

        return redirect()->back()->with('success', 'Contact Info Updated Successfully');
    }

}
