<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//=========================================================================
//================================== CMS ==================================
//=========================================================================

/*
|--------------------------------------------------------------------------
| CMS routes for guests admins
|--------------------------------------------------------------------------
|
*/

Route::get('/admin', function () {
	return redirect(route('admin.login'));
});

Route::middleware('guest:admin')->prefix('admin')->namespace('App\Http\Controllers\Cms')->name('admin.')->group(function () {

	// ADMIN LOGIN ROUTE
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
});
/*
|--------------------------------------------------------------------------
| CMS routes for Authenticated Admins
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:admin')->prefix('admin')->namespace('App\Http\Controllers\Cms')->name('admin.')->group(function () {

	// ADMIN LOGOUT ROUTE
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

	// PROFILE PAGE
	Route::prefix('profile')->name('profile.')->group(function () {
		Route::get('/', 'ProfileController@edit')->name('edit');
		Route::put('/', 'ProfileController@update')->name('update');
		Route::put('/password', 'ProfileController@password')->name('password');
	});

	// SETTINGS PAGE
	Route::get('settings', 'SettingController@index')->name('settings');
	Route::post('settings/maintenance', 'SettingController@maintenance')->name('settings.maintenance');

	// DASHBOARD
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	// ADMINS MANAGEMENT
	Route::resource('admins', 'AdminController', ['except' => ['show']]);
	Route::post('admins/block', 'AdminController@block')->name('admins.block');

	// SEO META TAGS
	Route::resource('seo-meta-tags', 'SeoMetaTagController', ['only' => ['edit', 'update']]);

	//============================================================

	/*
	* USERS MANAGEMENT
	*/

	Route::resource('users', 'UserController');
	Route::post('users/block', 'UserController@block')->name('users.block');

	//============================================================

	/*
	* GENERAL MANAGEMENT
	*/

	// BANNERS
	Route::resource('banners', 'BannerController');

	// HOME SLIDERS
	Route::post('home-slider/publish', 'HomeSliderController@publish')->name('home-slider.publish');
	Route::get('home-slider/order', 'HomeSliderController@order')->name('home-slider.order');
	Route::post('home-slider/order', 'HomeSliderController@orderSubmit');
	Route::resource('home-slider', 'HomeSliderController');


	// CATEGORIES
	Route::resource('categories', 'CategoryController');

	// MEDIA
	Route::prefix('media')->name('media.')->group(function () {
		Route::post('/makeTheImageFit', 'MediaController@makeTheImageFit')->name('makeTheImageFit');
	});
	Route::resource('media', 'MediaController');

	// FIXED SECTIONS
	Route::resource('fixed-sections', 'FixedSectionController');
	Route::post('fixed-sections/publish', 'FixedSectionController@publish')->name('fixed-sections.publish');
	Route::get('fixed-sections/{id}/image/remove', 'FixedSectionController@imageRemove')->name('fixed-sections.image.remove');

	// CONTACT DETAILS
	Route::get('contact-details/order', 'ContactDetailController@order')->name('contact-details.order');
	Route::post('contact-details/order', 'ContactDetailController@orderSubmit');
	Route::resource('contact-details', 'ContactDetailController');

	// FORMS EMAILS
	Route::resource('forms-emails', 'FormsEmailController', ['except' => ['destroy']]);

	//============================================================

	/*
	* PLATFORM CONTENT
	*/

	// PROJECTS
	Route::prefix('projects')->name('projects.')->group(function () {
		Route::post('/publish', 'ProjectController@publish')->name('publish');
		Route::get('/{id}/replicate', 'ProjectController@replicate')->name('replicate');
		Route::post('/bulk-delete', 'ProjectController@bulk_delete')->name('bulk_delete');
		Route::get('/trash', 'ProjectController@trash')->name('trash');
		Route::get('/trash/{id}', 'ProjectController@trash_show')->name('trash.show');
		Route::get('/trash/{id}/restore', 'ProjectController@trash_restore')->name('trash.restore');
		Route::post('/trash/destroy/{id}', 'ProjectController@trash_destroy')->name('trash.destroy');
		Route::get('/order', 'ProjectController@order')->name('order');
		Route::post('/order', 'ProjectController@orderSubmit');
	});
	Route::resource('projects', 'ProjectController');

	// CLIENTS
	Route::post('clients/publish', 'ClientController@publish')->name('clients.publish');
	Route::get('clients/order', 'ClientController@order')->name('clients.order');
	Route::post('clients/order', 'ClientController@orderSubmit');
	Route::resource('clients', 'ClientController');

	// DESIGNERS
	Route::post('designers/publish', 'DesignerController@publish')->name('designers.publish');
	Route::get('designers/order', 'DesignerController@order')->name('designers.order');
	Route::post('designers/order', 'DesignerController@orderSubmit');
	Route::resource('designers', 'DesignerController');

	// PROFILE DETAILS
	Route::resource('profile-details', 'ProfileDetailController');

	// SERVICE DETAILS
	Route::resource('service-details', 'ServiceDetailController');

	// SOCIAL MEDIA
	Route::resource('social-media', 'SocialMediaController');
	//============================================================

	/*
	* FORM & SUBMISSIONS
	*/

	// CONTACT REQUESTS
	Route::resource('contact-requests', 'ContactRequestController', ['only' => ['index', 'show', 'destroy']]);

	//============================================================

});
