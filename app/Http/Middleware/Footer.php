<?php

namespace App\Http\Middleware;


use App\Models\SocialMedia;

use Closure;
use Auth;
use View;

class Footer 
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
        $social_media = SocialMedia::select([
            'id',
            'type',
            'value',
            'class',
        ])->whereNotIn('type', ['lat', 'lng'])->get();

        View::share(compact('social_media'));

        return $next($request);
    }

}
