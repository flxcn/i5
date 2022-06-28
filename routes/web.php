<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;

use App\Models\Client;



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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [ClientController::class, 'search']);

Route::resources([
    'users' => UserController::class,
    'clients' => ClientController::class,
    'contacts' => ContactController::class
]);


// // All Clients
// Route::get('/clients', [ClientController::class, 'index'])->middleware('auth');

// // Show Create Form
// Route::get('/clients/create', [ClientController::class, 'create'])->middleware('auth');

// // Store Client Data
// Route::post('/clients', [ClientController::class, 'store'])->middleware('auth');

// // Show Edit Form
// Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->middleware('auth');

// // Update Client
// Route::put('/clients/{client}', [ClientController::class, 'update'])->middleware('auth');

// // Delete Client
// Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->middleware('auth');

// // Manage Clients
// Route::get('/clients/manage', [ClientController::class, 'manage'])->middleware('auth');

// // Single Client
// Route::get('/clients/{client}', [ClientController::class, 'show']);

// // Contacts
// // *******************************************************************









// // // Route::get('/clients/{id}', function () {
// // //     return view('clients', [
// // //         'client' ==> Client::find($id)
// // //     ]);
// // // });

// // // /clients/:clientId/contacts/:contactId

// // Route::get('/contacts/{id}', function($id){
// //     return response('Post '.$id);
// // })->where('id', '[0-9]+$');

// // Route::get('/users/{id}', function($id){
// //     return view('users', [
// //         // 'id' -> 'id'
// //     ]);
// // })->where('id', '[0-9]+$');

// // Route::get('/search', function(Request $request) {
// //     return $request->name;
// // });
// // // Route::get('/resources', function () {
// // //     return view('resources.index');
// // // });

// // // have a section for clients I have worked on.

// // // A search for clients, using any piece of info