@extends('layouts.app')
@section('title')Úprava knihy {{$book->title}} @endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulár pre úpravu knihy</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('book.update', $book->id)}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Názov</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="author_id">Autor</label>
                            <select id="author_id" class="custom-select" name="author_id">
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name." ".$author->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 offset-1">
                        <div class="form-group">
                            <label>Dostupnosť</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="is_borrowed" @if(!$book->is_borrowed) checked @endif value=0>
                                <label for="customRadio1" class="custom-control-label">Dostupná</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="is_borrowed"
                                       @if($book->is_borrowed) checked @endif value=1>
                                <label for="customRadio2" class="custom-control-label">Vypožičaná</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Uložiť</button>
            </div>
        </form>
    </div>

@endsection
