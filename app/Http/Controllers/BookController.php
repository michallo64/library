<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class BookController
 * @package App\Http\Controllers
 * @mixin Builder
 */
class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        $authors = Author::all();
        return view('admin.books', compact('books', 'authors'));
    }
    public function borrow($id){
        $book = Book::find($id);
        if($book->is_borrowed){
            $book->is_borrowed = false;
            $notification = array(
                'message' => 'Kniha bola vrátená.',
                'alert-type' => 'info',
            );
        }else{
            $book->is_borrowed = true;
            $notification = array(
                'message' => 'Kniha bola vypožičaná.',
                'alert-type' => 'info',
            );
        }
        $book->save();
        return redirect()->back()->with($notification);
    }
    public function edit($id){
        $book = Book::find($id);
        $authors = Author::all();
        return view('admin.bookEdit', compact('book', 'authors'));
    }
    public function delete($id){
        $book = Book::find($id);
        if(!$book->is_borrowed){
            $book->delete();
            $notification = array(
                'message' => 'Kniha bola zmazaná.',
                'alert-type' => 'info',
            );
        }else{
            $notification = array(
                'message' => 'Najprv je potrebné knihu vrátiť.',
                'alert-type' => 'error',
            );
        }

        return redirect()->back()->with($notification);
    }
    public function update($id, Request $request){
        $this->validate($request, [
            'title' => 'required',
            'is_borrowed' => 'required|boolean',
            'author_id' => 'required',
        ]);
        $book = Book::find($id);
        $book->update($request->all());
        $book->is_borrowed = $request->is_borrowed;
        $book->author_id = $request->author_id;
        $book->save();
        $notification = array(
            'message' => 'Kniha bola upravená.',
            'alert-type' => 'success',
        );
        return redirect()->route('books.index')->with($notification);
    }

    public function create(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'author_id' => 'required',
        ]);
        $book = new Book($request->all());
        $book->author_id = $request->author_id;
        $book->save();
        $notification = array(
            'message' => 'Kniha bola pridaná.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
