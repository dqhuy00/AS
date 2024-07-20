<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function list()
    {
        $books = DB::table('books')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('books.*', 'name')
            ->orderByDesc('id')
            ->get();
        return view('admin.books.list', compact('books'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.books.create', compact('categories'));
    }

    public function add(Request $request)
    {
        // $data = $request->except('_token');
        $data = [
            'title' => $request['title'],
            'thumbnail' => $request['thumbnail'],
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'publication' => $request['publication'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'category_id' => $request['category_id'],
        ];
        // dd($data);
        // dd($request->all());
        DB::table('books')->insert($data);
        return redirect()->route('admin.book.list');
    }

    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request)
    {
        $data = [
            'title' => $request['title'],
            'thumbnail' => $request['thumbnail'],
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'publication' => $request['publication'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'category_id' => $request['category_id'],
        ];
        DB::table('books')->where('id', $request['id'])->update($data);
        return redirect()->route('admin.book.list');
    }

    public function delete($id)
    {
        DB::table('books')->delete($id);
        return redirect()->route('admin.book.list');
    }
}
