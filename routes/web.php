<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return inertia::render('Home');
});
Route::get('/users', function () {
//    sleep(2);
    return inertia::render('Users/Index' , [
                'users' => User::
//                        Query()
//                    ->when(\Illuminate\Support\Facades\Request::input('search'),function($query,$search){
//                        $query->where('name','like', "%{$search}%");
//                    })->
                    paginate()
                    ->withQueryString()
                    ->map(fn($user) =>[
                        'id'=> $user->id,
                        'name' => $user->name
                    ]),
                'filters' => \Illuminate\Support\Facades\Request::Only(['search'])
    ]);
});
Route::get('/settings', function () {
    return inertia::render('Settings');
});

Route::get('/users/create', function () {
    return inertia::render('Users/Create');
});

Route::post('/users', function () {
    $attributes = Request::validate([
        'name' => 'required',
        'email' => ['required' , 'email'],
        'password' => 'required',
    ]);

    User::create($attributes);

    return redirect('/users');
});

Route::post('/logout', function () {
    dd(request('foo'));
});

