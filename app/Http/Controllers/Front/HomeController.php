<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Aboutbanner;
use App\Models\Blogs;
use App\Models\Brand;
use App\Models\Project;
use App\Models\Services;
use App\Models\Slider;
use App\Models\ContactUs;
use App\Models\Portfolio;
use App\Models\GlobalPresence;
use App\Models\Exhibition;
use App\Models\Query;
use App\Models\BussinessSetting;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactDetail;
use Carbon\Carbon;
use App\Mail\QuoteNotification;


class HomeController extends Controller
{

    public function home()
    {
        $banners = Banner::all();
        $aboutbanners = Aboutbanner::all();
        $blogs = Blogs::all();
        $brand = Brand::all();
        $projects = Project::all();
        $services = Services::all();
        $sliders = Slider::all();
        
        // dd($sliders);
        return view('website.home', compact('banners', 'aboutbanners', 'blogs', 'brand', 'projects', 'services','sliders'));
    }

    public function portfolio(){
        $portfolios = Portfolio::orderBy('priority', 'asc')->get();
        return view('website.pages.portfolio', compact('portfolios'));
    }

    public function portfoliodetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('website.portfoliodetail', compact('portfolio'));
    }



    public function contact()
    {
        $contacts = ContactDetail::first();
        return view('website.contact', compact('contacts'));
    }

    
    public function contactUsStore(Request $request)
    {
        // dd($request->all());
        try {
            ContactUs::create($request->only(['name', 'email', 'phone', 'subject', 'message']));

            $logoUrl = asset('public/images/DCN-logo-w.png');
            // dd($logoUrl);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone ?? 'No Phone',
                'subject' => $request->subject ?? 'No Subject',
                'userMessage' => $request->message,
                'logoUrl' => $logoUrl
            ];


            Mail::send('email-templates.contact', $data, function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Thank You for Contacting Us')
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });

            return redirect()->back()->with('success', 'Message Sent Successfully!');
        } catch (\Throwable $e) {
            Log::error('Contact form error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Something went wrong! Please try again later.');
        }
    }

    public function getAQuote(){
        return view('website.pages.get-a-quote');
    }

    public function globalPresence($slug){
        $global_presence = GlobalPresence::where('slug',$slug)->first();
        if(!$global_presence){
            return back()->with('error','Global Presence Not Found!');
        }
        $services = Services::all();
        $decoded_gallerys = @json_decode($global_presence->gallery,true);
        return view('website.pages.global-presence',compact('global_presence','services','decoded_gallerys'));
    }

    public function emailTemplate(){
        return view('email-templates.query');
    }

    public function aboutUs(){
        return view('website.pages.about-us');
    }

     public function exhibition($slug){
        $exhibition = Exhibition::where('slug',$slug)->first();
        if(!$exhibition){
            return back()->with('error','Exhibition Not Found!');
        }
        $infos = json_decode($exhibition->infos, true);
        $infos['ex_image'] = json_decode($infos['ex_image'], true); 
        // dd($slug,$infos);
        return view('website.pages.exhibition.view',compact('exhibition','infos'));
    }

    public function quoteStore(Request $req){
        // dd($req->all());
        $query = new Query();
        $query->type = $req->type;
        $query->city = $req->city;
        $query->event_name = $req->event_name;
        $query->event_date = $req->event_date;
        $query->stand_size = $req->stand_size;
        $query->name = $req->name;
        $query->email = $req->email;
        $query->mobile_no = $req->mobile_no;
        $query->comment = $req->comment;
        $query->save();
        $subject = "Get a Quote Notification |🗓️ " . \Carbon\Carbon::today()->format('d-M-Y') . " | 🕒 " . \Carbon\Carbon::now()->format('h:i A');
        $email = $req->email;
        $logo = getenv('ASSET_URL') . '/' . BussinessSetting::where('type','logo')->value('value');
        $adminEmail = BussinessSetting::where('type','email')->value('value');
        try {
            Mail::to($email)->queue(new QuoteNotification($query, $subject, $adminEmail, $logo));  
            Log::channel('email')->info('Quote Email sent successfully to ' . $email . ' and Admin: ' . $adminEmail);
        } catch (\Exception $mailException) {
            Log::channel('email')->error('Failed to send email to ' . $email . '. Error: ' . $mailException->getMessage());
        }
        return back()->with('success','We Will Touch You Soon!');


    }


}
