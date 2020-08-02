@extends('layouts.app')
@section('title')Úprava autora {{$author->name. " " .$author->surname}} @endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulár pre úpravu knihy</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('author.update', $author->id)}}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Meno</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$author->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="surname">Priezvisko</label>
                            <input type="text" class="form-control" id="surname" name="surname"
                                   value="{{$author->surname}}">
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
