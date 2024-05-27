<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    //return view('welcome');
    
    //FETCH ALL USERS
    //$users = DB::select('select * from users');

    //create new user
    // $user = DB::insert('insert into users (name, email, password) values(?,?,?)', [
    //     'Joseph',
    //     'joseph@gmial.com',
    //     'Joseph_123'
    // ]);

    //update user
    //$update = DB::update('update users set email="josepholaoye@gmail.com" where id=2'); 
    //you can also use binding
        // $update = DB::update("update users set email=? where id=?", [
        //     'joseph@gmail.com',
        //     '2'
        // ]); 
    
    // Delete user
    //$delete = DB::delete("DELETE FROM users WHERE id=?", [2]);

    //dd($users);

  // LET US USE QUERY BUILDER TO PERFORM ALL WHAT WE HAVE DONE ABOVE

  // FETCH ALL USERS
   //$users = DB::table('users')->get();
 //  $users = DB::table('users')->find(4);   

   // Create a new user
//    $user = DB::table('users')->insert([
//     'name' => 'Favour',
//     'email' => 'favour@gmail.com',
//     'password' => 'Favour_123'
// ]);
// insert several records at once
    // $user = DB::table('users')->insert([        
    //     ['name' => 'Elizabeth', 'email' => 'elizabeth@gmail.com', 'password' => 'Elizabeth_123'],
    //     ['name' => 'Treasure','email' => 'treasure@gmail.com', 'password' => 'Treasure_123'],
    // ]);

    // update a user
    //$update = DB::table('users')->where('id', 5)->update(['email'=> 'gracefemitayo@gmail.com']);
    
    // Delete  user
    //$delete = DB::table('users')->where('id', 5)->delete();

    //LET US USE ELOQUENT TO PERFORM ALL WHAT WE HAVE DONE ABOVE
    // FETCH ALL USERS
    //$users = User::get();
    //$users = User::find(12);
    $user = User::find(12);

    //create user
//     $user = User::create([
//     'name' => 'Tumi',
//     'email' => 'Tumininu@gmail.com',
//     'password' => 'Tumininu_123'
// ]);

// update
/* $update = User::where('id',10)->update([
    "name" => strtoupper("Funmi")
    
]); */

    // Delete user
    /* $delete = User::find(9);
    $delete->delete(); */
    dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
