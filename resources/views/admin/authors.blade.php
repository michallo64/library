@extends('layouts.app')
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
@section('title')Zoznam autorov @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Pridať autora
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="authors" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Počet kníh</th>
                    <th>Akcia</th>
                </tr>
                </thead>
                @foreach($authors as $author)
                    <tr>
                        <td>{{$author->id}}</td>
                        <td>{{$author->name." ".$author->surname}}</td>
                        <td>{{$author->books->count()}}</td>
                        <td><a href="{{route('author.edit', $author->id)}}"
                               class="btn btn-info">Editovať</a> ||
                            <a href="{{route('author.delete', $author->id)}}"
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
                    <h4 class="modal-title">Pridanie nového autora</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('author.create')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Meno</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Meno">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="surname">Priezvisko</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                           placeholder="Priezvisko">
                                </div>
                            </div>
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
