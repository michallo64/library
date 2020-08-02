@extends('layouts.app')
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
@section('title')Zoznam kníh @endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Pridať knihu
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="authors" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th>Autor</th>
                    <th>Stav</th>
                    <th>Akcia</th>
                </tr>
                </thead>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author->name." ".$book->author->surname}}</td>
                        <td>@if($book->is_borrowed)Vypožičaná @else Dostupná @endif</td>
                        <td><a href="{{url('books/borrow/'.$book->id)}}"
                               class="btn @if($book->is_borrowed) btn-warning @else btn-primary @endif">@if($book->is_borrowed)
                                    Vrátiť @else Vypožičať @endif</a> ||
                            <a href="{{route('books.edit', $book->id)}}"
                               class="btn btn-info">Editovať</a> ||
                            <a href="{{route('books.delete', $book->id)}}"
                               class="btn btn-danger"
                               id="delete">Zmazať</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pridanie novej knihy</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('books.create')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Názov</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Názov">
                        </div>
                        <div class="form-group">
                            <label for="author_id">Autor</label>
                            <select id="author_id" class="custom-select" name="author_id">
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name." ".$author->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Uložiť</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Zavrieť</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#authors").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Slovak.json"
                }
            });
        });
    </script>
@endpush
