<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        return view('admin.authors', compact('authors'));
    }
    public function edit($id){
        $author = Author::find($id);
        return view('admin.authorEdit', compact('author'));
    }
    public function delete($id){
        $author = Author::find($id);
        if($author->books->count() == 0){
            $author->delete();
            $notification = array(
                'message' => 'Autor bol vymazaný.',
                'alert-type' => 'info',
            );
        }else{
            $books = $author->books;
            $count = 0;
            foreach ($books as $book){
                if($book->is_borrowed){
                    $count += 1;
                }else{
                    $book->delete();
                }
            }
            if ($count == 0){
                $author->delete();
                $notification = array(
                    'message' => 'Autor a jeho knihy boli vymazané.',
                    'alert-type' => 'info',
                );
            }else{
                $notification = array(
                    'message' => 'Autor nebol vymazaný, niektoré jeho knihy nie sú vrátené!',
                    'alert-type' => 'error',
                );
            }
        }
        return redirect()->back()->with($notification);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
        ]);
        $author = Author::find($id);
        $author->update($request->all());
        $author->save();
        $notification = array(
            'message' => 'Autor bol úspešne upravený',
            'alert-type' => 'success',
        );
        return redirect()->route('author.index')->with($notification);
    }

    public function create(Request $request){
        $author = new Author($request->all());
        $author->save();
        $notification = array(
            'message' => 'Autor bol úspešne vytvorený.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
