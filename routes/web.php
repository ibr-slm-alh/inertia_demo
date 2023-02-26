<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('login', [LoginController::class , 'create'])->name('login');
Route::post('login', [LoginController::class , 'store']);
Route::post('logout', [LoginController::class , 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return inertia::render('Home');
    });
    Route::get('/users', function () {
//    sleep(2);
        return inertia::render('Users/Index', [
            'users' => User::
//                        Query()
//                    ->when(\Illuminate\Support\Facades\Request::input('search'),function($query,$search){
//                        $query->where('name','like', "%{$search}%");
//                    })->
            paginate()
                ->withQueryString()
                ->map(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => \Illuminate\Support\Facades\Request::Only(['search']),
            'can' =>[
                'createUser' => Auth::user()->can('create',User::class)
            ]
        ]);
    });
    Route::get('/settings', function () {
        return inertia::render('Settings');
    });

    Route::get('/users/create', function () {
        return inertia::render('Users/Create');
    })->middleware('can:create,App\Models\User');

    Route::post('/users', function () {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    });

});
