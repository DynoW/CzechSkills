<?php
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route for the welcome page, displaying all posts
Route::get('/', function () {
    $posts = Post::all();
    return view('welcome', compact('posts'));
})->name('welcome');

// Route for the login page
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route for handling login form submission
Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Authentication passed
        auth()->login($user);
        return redirect('/user-panel');
    } else {
        // Authentication failed
        return back()->withErrors(['username' => 'Invalid credentials.']);
    }
})->name('login-auth');

// Route for logging out
Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('welcome');
})->name('logout');

// Route for the user panel, accessible only to authenticated users
Route::get('/user-panel', function () {
    return view('user-panel');
})->name('user-panel')->middleware('auth');

// Route for updating the user's phase, accessible only to authenticated users
Route::post('/update-phase', function (Request $request) {
    $request->validate([
        'phase' => 'required|in:gold,silver,bronze',
    ]);

    $user = auth()->user();
    $user->phase = $request->phase;
    $user->save();

    return redirect()->route('user-panel');
})->name('update-phase');

// Route for displaying the post creation form, accessible only to authenticated admins
Route::get('/create-post', [PostController::class, 'create'])->name('create-post')->middleware('auth','admin');

// Route for handling post creation form submission, accessible only to authenticated admins
Route::post('/create-post', [PostController::class, 'store'])->name('store-post')->middleware('auth', 'admin');
