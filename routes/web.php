<?php

use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    return view('welcome');
})->name('index');
Route::get('testform', function () {
    return view('components.token-btn');
})->name('testform');


Route::post('/tokens/create', function (Request $request) {
        // Extract request parameters
        $username = $request->input('username');
        $password = $request->input('password');
        $tokenName = $request->input('token_name');
    
        // Find the user by username or create a new one if not found
        $user = User::firstOrCreate(['name' => $username]);
    
        // Set the user's password if it's not already set
        if (!$user->password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    

    // Authenticate the user
    Auth::login($user);

    // Generate a personal access token for the authenticated user with the specified token name
    $token = $user->createToken($tokenName)->plainTextToken;

    // Return the generated token as a JSON response
    return response()->json(['token' => $token]);
})->name('token-create');


Route::middleware('auth:sanctum')->resource('cats', CatController::class);

