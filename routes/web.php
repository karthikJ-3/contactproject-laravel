'<?php

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;



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
    return view('contact');
});


Route::post('/store',function(Request $req){
    $req->validate(
        [
            'name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'content'=>'required',
            'checkbox'=>'required',
        ]
        );

        $contact= new Contact;
        $contact->name=$req->input('name');
        $contact->email=$req->input('email');
        $contact->gender=$req->input('gender');
        $contact->content=$req->input('content');
        $contact->checkbox=$req->input('checkbox');

        $contact->save();

        return redirect ('/')->with('message','successfully form submitted!!!');

});

Route::get('/register',function(){
    return view('register');
})->middleware('guest');

Route::post('/userstore',function(Request $req){
    $req->validate(
        [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]
        );

        $user= new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));

        $user->save();

        return redirect ('/login')->with('message','successfully form submitted!!!');

});

Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::post('/authenticate',function(Request $req){

    $req->validate(
        [
            'email'=>'required|email',
            'password'=>'required',
        ]
        );

        $email=$req->input('email');
        $password=$req->input('password');

        if(Auth::attempt(['email'=>$email,'password'=>$password]))
        {
            $user = User::where('email',$email)->first();
            Auth::login($user);
            return redirect('/home');
        }
        else
        {
            return back()->withErrors(['Invalid Credentials!']);
        }
});

Route::get('/logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::get('/home',function(){
    $contact = DB::select("select * from contacts");
    return view('home',['contact'=>$contact]);
})->middleware('auth');

