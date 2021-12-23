<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    if (!$user->hasRole('admin')) {
        $customer = Customer::where('user_id', $user->id)->first();
        return redirect('/customer/' . $customer->id);
    }

    return redirect('/customer');
})->middleware(['auth'])->name('dashboard');

Route::resource('/customer', CustomerController::class);

require __DIR__ . '/auth.php';
