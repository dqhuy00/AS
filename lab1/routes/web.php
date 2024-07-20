<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    $user = Session::get('user');
    $books = DB::table('books')->limit(18)->get();
    $categories = DB::table('categories')->get();
    $expensiveBooks = DB::table('books')->orderBy('price', 'desc')->limit(8)->get();
    $cheapBooks = DB::table('books')->orderBy('price', 'asc')->limit(8)->get();
    return view('home', compact('books', 'categories', 'expensiveBooks', 'cheapBooks', 'user'));
})->name('page.home');
Route::get('/sach/{id}', function ($id) {
    $user = Session::get('user');
    $book = DB::table('books')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('books.*', 'name')
        ->where('books.id', '=', $id)
        ->first();
    $categories = DB::table('categories')->get();
    $comments = DB::table('comments')
        ->join('accounts', 'account_id', '=', 'accounts.id')
        ->select('comments.*', 'fullname')
        ->where('comments.book_id', '=', $book->id)
        ->get();
    $expensiveBooks = DB::table('books')->orderBy('price', 'desc')->limit(8)->get();
    $cheapBooks = DB::table('books')->orderBy('price', 'asc')->limit(8)->get();

    return view('ctsp', compact('book', 'categories', 'expensiveBooks', 'cheapBooks', 'user', 'comments'));
    // return $book;
})->name('page.sach');
Route::get('/loai/{id}/{name}', function ($id, $name) {
    $user = Session::get('user');
    $books = DB::table('books')->where('category_id', '=', $id)->get();
    $categories = DB::table('categories')->get();
    $expensiveBooks = DB::table('books')->orderBy('price', 'desc')->limit(8)->get();
    $cheapBooks = DB::table('books')->orderBy('price', 'asc')->limit(8)->get();
    return view('loai', compact('user', 'books', 'name', 'categories', 'expensiveBooks', 'cheapBooks'));
});
Route::get('/dangky', function () {
    $user = Session::get('user');
    $categories = DB::table('categories')->get();
    $expensiveBooks = DB::table('books')->orderBy('price', 'desc')->limit(8)->get();
    $cheapBooks = DB::table('books')->orderBy('price', 'asc')->limit(8)->get();return view('dangky', compact('user', 'categories', 'expensiveBooks', 'cheapBooks'));
})->name('dangky');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/dk', [AuthController::class, 'dangky'])->name('dk');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/comment', [CommentController::class, 'createComment'])->name('comment');

Route::prefix('admin')->group(function () {
    Route::get('/book/list', [BookController::class, 'list'])->name('admin.book.list');
    Route::get('/book/create', [BookController::class, 'create'])->name('admin.book.create');
    Route::post('/book/add', [BookController::class, 'add'])->name('admin.book.add');
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('admin.book.edit');
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name('admin.book.update');
    Route::delete('/book/delete/{id}', [BookController::class, 'delete'])->name('admin.book.delete');
});