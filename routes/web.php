<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Datacontroller;
use App\Http\Controllers\Indexcontroller;
use App\Http\Controllers\Jabatancontroller;
use App\Http\Controllers\Karyawancontroller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [Authcontroller::class, 'index_login_admin'])->name('login.admin.index');
Route::post('/login/post', [Authcontroller::class, 'login_web_post'])->name('post.login.web');
Route::middleware(['auth:web'])->group(function () {
    Route::get('/', [Indexcontroller::class, 'index'])->name('index');

    Route::resource('karyawan', Karyawancontroller::class);
    Route::resource('jabatan', Jabatancontroller::class);
    Route::resource('data', Datacontroller::class);

    Route::get('/detail/data', [Datacontroller::class, 'get_detail'])->name('get.detail');

    Route::get('/report/{bln?}', [Indexcontroller::class, 'report_index'])->name('report.index');
    Route::post('/report/post', [Indexcontroller::class, 'report_post'])->name('report.post');

    Route::get('/slip/{id?}/{tanggal?}', [Indexcontroller::class, 'slip'])->name('slip');

    Route::get('/logout/admin', function () {
        Auth::guard('web')->logout();
        return redirect()->route('login.admin.index');
    })->name('logout.web');
});
