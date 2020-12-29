<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\SocialMedia;
use App\Models\ContactRequest;
use Mail;

class ContactController extends Controller
{
    public function index(){

        $page_title = 'Contact';
        $lats = SocialMedia::select([
            'id',
            'type',
            'value',
        ])->where('type', 'lat')->get();

        $lngs = SocialMedia::select([
            'id',
            'type',
            'value',
        ])->where('type', 'lng')->get();
        
        $lat = $lats[0];
        $lng = $lngs[0];

        return view('web/pages/contact', compact(
            'page_title', 'lat', 'lng'
        ));
    }
    
    /**
     * Store a newly created row in the database
     *
     */
    public function submit(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $row = new ContactRequest;
        $row->full_name = $request->full_name;
        $row->email = $request->email;
        $row->subject = $request->subject;
        $row->message = $request->message;
        $row->save();

        try{
            Mail::send('emails.contact', [
            'name' => $request->full_name,
            'email' => $request->email,
            'comment' => $request->message ],
            function ($message) {
                    $message->from(env('MAIL_FROM_ADDRESS'));
                    $message->to(env('MAIL_TO_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject("env('APP_NAME') Contact Form");
        });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        return redirect()->route('contact')->withStatus('Form successfully submitted.');
    }

}
