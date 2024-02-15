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
        $username = $request->input('name');
        $password = $request->input('password');
        $tokenName = $request->input('token_name');
        $expires_at = $request->input('expires_at');
    // make a user with the model
            $user = User::create(
                [
                    'name'       => $username,
                    'password' =>  Hash::make($request->input('password')),
                    'expires_at' => $expires_at,
                ]
                );
        // }
                // save him into db
        $user->save();

    // Authenticate the user
    Auth::login($user);

    // Generate a personal access token for the authenticated user with the specified token name
    $token = $user->createToken($tokenName)->plainTextToken;

    // Return the generated token as a JSON response
    return redirect()->route('cats.index');
})->name('token-create');


//protected route
Route::middleware('auth:sanctum')->resource('cats', CatController::class);
//protected route
Route::middleware('auth:sanctum')->post('/cats/vote', [CatController::class, 'vote'])->name('catvote');
