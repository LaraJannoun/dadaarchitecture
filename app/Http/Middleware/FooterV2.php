<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\ContactDetail;

use Closure;
use Auth;
use View;

class FooterV2 extends Middleware
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $contact_details = ContactDetail::select([
            'id',
            'slug',
            'country',
            'value',
            'link',
            'pos'
            ])->orderBy('pos')->get();

        $phone_details = $contact_details->filter(function ($value, $key) { 
            return $value['slug'] == 'phone'; 
        });

        $address_details = $contact_details->filter(function ($value, $key) { 
            return $value['slug'] == 'address'; 
        });

        $email_details = $contact_details->filter(function ($value, $key) { 
            return $value['slug'] == 'e-mail'; 
        });

        View::share(compact('phone_details', 'address_details', 'email_details'));
        return $next($request);
    }

      
}
