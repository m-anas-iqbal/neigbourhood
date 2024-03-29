<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\PaginationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//================ clear cache ================= //
// Clear project cache
Route::get('/clear-project', function() {
    \Artisan::call('route:cache');
    \Artisan::call('config:cache');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('optimize:clear');
    return 'Project cache cleared';
});

 //Clear route cache
 Route::get('/route-cache', function() {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache
Route::get('/config-cache', function() {
    \Artisan::call('config:cache');

    return 'Config cache cleared';
});

// Clear  cache
Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
});
// Clear view cache
Route::get('/view-clear', function() {
    \Artisan::call('view:clear');
    return 'View cache cleared';
});

// Clear cache using reoptimized class
Route::get('/optimize-clear', function() {
    \Artisan::call('optimize:clear');
    return 'View cache cleared';
});

//================ clear cache  end ================= //

Route::get('/', function () {
    if (Auth::guard('users')->check()) {
        return  redirect('/dashboard');
  }else{
     return view('frontend.login.login');
  }
})->name('login');

Route::get('/pagination', [PaginationController::class, 'index'])->name('pagination');
Route::get('/pagination/fetch_data', [PaginationController::class, 'fetch_data']);

Route::get('/contact', function () {return view('frontend.contact');})->name('contact');
Route::post('/contact_post', [HomeController::class, 'contact_post'])->name('contact_post');

Route::post('/login_post', [HomeController::class, 'login_post'])->name('login_post');

Route::get('/registration', function () {
    if (Auth::guard('users')->check()) {
        return  redirect('/dashboard');

  }else{
    return view('frontend.login.signup');
  }
});
Route::post('/registration_post', [HomeController::class, 'registration_post'])->name('registration_post');

// facebook login
Route::get('/fb_login', [FacebookController::class, 'fb_login']);
Route::get('/fb/callback', [FacebookController::class, 'callback']);
Route::get('privacy_policy', [FacebookController::class, 'privacy_policy']);
Route::get('deletionurl', [FacebookController::class, 'deletionurl']);


//google login
Route::get('/g_login', [GoogleController::class, 'g_login']);
Route::get('/gmail/callback', [GoogleController::class, 'callback']);
Route::get('registrationEmailVerification/{code}', [HomeController::class, 'registrationEmailVerification']);




//forgotPasswordProcess
Route::get('/forgotPassword', function () {
    if (Auth::guard('users')->check()) {
        return  redirect('/dashboard');
  }else{
    return view('frontend.login.forgot_password');
  }
});
Route::post('/forgotPasswordProcess', [HomeController::class, 'forgotPasswordProcess']);
Route::post('/delcomment',[AdminController::class, 'delcomment']);
//newPasswordProcess
Route::get('newPassword/{pass}', function () {
    if (Auth::guard('users')->check()) {
        return  redirect('/dashboard');

  }else{
    return view('frontend.login.new_password');
  }
});
Route::post('newPasswordProcess/', [HomeController::class, 'newPasswordProcess']);
//getLocationVotes
Route::post('getLocationVotes/', [HomeController::class, 'getLocationVotes']);
//getVoteCountPercentage
Route::post('getVoteCountPercentage/', [HomeController::class, 'getVoteCountPercentage']);

//uncheckVote
Route::post('uncheckVote/', [HomeController::class, 'uncheckVote']);

//setUserDefaultLocation
Route::post('/setUserDefaultLocation', [HomeController::class,'setUserDefaultLocation']);


Route::get('/terms-and-condition', function () {
    return view ('frontend.terms-condition');
});
Route::get('/privacy-policy', function () {
    return view ('frontend.privacy-policy');
});

Route::middleware(['auth:users', 'PreventBackHistory'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name("dashboard");
    Route::get('/profile', function () {return view('frontend.profile');})->name('profile');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::post('/comment_post', [HomeController::class, 'comment_post'])->name('comment_post');
    Route::post('/answer_post', [HomeController::class, 'answer_post'])->name('answer_post');
    Route::post('/search_area', [HomeController::class, 'search_area'])->name('search_area');
    Route::post('/ajax_search_area', [HomeController::class, 'ajax_search_area'])->name('ajax_search_area');
    Route::post('/profile_post', [HomeController::class, 'profile_post'])->name('profile_post');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/',  function () {
        if (Auth::guard('admin')->check()) {
            return  redirect('/admin/dashboard');

      }else{
        return view('admin.login');
      }
    })->name('login');
    Route::post('/login_post', [AdminController::class, 'login_post']);
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', function () {return view('admin.index');});
        // questions
        Route::get('/question', function () {return view('admin.question.question');});
        Route::get('/addquestion', function () {return view('admin.question.add_question');});
        Route::post('/addquestion_post', [AdminController::class, 'addquestion_post']);
        Route::get('/editquestion/{id}', function () {return view('admin.question.edit_question');});
        Route::post('/editquestion_post',  [AdminController::class, 'editquestion_post']);
        Route::post('/delquestion_post', [AdminController::class, 'delquestion_post']);

            //comments|answers
        Route::get('/contact_list', function () {return view('admin.contact_list');});
        Route::post('/delcontact',[AdminController::class, 'delcontact']);

        //comments|answers
        Route::get('/comment', function () {return view('admin.question.answer');});
        Route::post('/delcomment',[AdminController::class, 'delcomment']);
        Route::post('/comment_s',[AdminController::class, 'comment_s']);

        //comments|answers
        Route::get('/profile', function () {return view('admin.profile');});
        Route::post('/profile_post',[AdminController::class, 'profile_post']);
    });
});
