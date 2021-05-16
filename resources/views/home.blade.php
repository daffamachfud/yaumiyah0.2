@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Yaumiyah tanggal {{ $date }}</div>

                <div class="card-body">
                    {{$name}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="magin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="panel-body">
                            <!-- New Amalan Form -->
                            <form action="/insertAmalan" method="POST" class="form-horizontal">
                                {{ csrf_field() }}

                                <!-- Amalan Name -->
                                <div class="form-group" style="padding:10px;">
                                    <label for="amalan" class="col-sm-3 control-label">Amalan</label>

                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="amalan-name" class="form-control">
                                    </div>
                                </div>

                                <!-- Add Task Button -->
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-dark">
                                             Tambah Amalan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if (count($amalan) > 0)
        <div class="panel panel-default">
            <div class="panel-body" style="padding:10px;">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Amalan</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($amalan as $a)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $a->name }}</div>
                                </td>

                                <td>
                                <form action="/deleteAmalan/{{ $a->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                     Hapus
                                    </button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
            </div>
        </div>
    </div>
</div>
@endsection
