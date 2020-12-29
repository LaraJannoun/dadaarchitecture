<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('cms.pages.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        Auth::guard('admin')->user()->update($request->all());

        return back()->withStatus('Profile successfully updated.');
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        Auth::guard('admin')->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus('Password successfully updated.');
    }

}
