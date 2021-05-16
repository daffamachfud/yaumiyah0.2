@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laporan Amalan</div>

                <div class="card-body">

                 <div class="form-group">
                    <select name="users" id="users" class="form-control" value="">
                        <option value=""> Pilih Nama </option>
                        @foreach ($users as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                 </div>


                <div class="form-group">
                <label for="date">Tanggal Amalan</label>
                <input class="date form-control" name="date" type="text">
                </div>
                <form action="/amalan/" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-dark">
                                     Cari
                                    </button>
                                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Amalan {{$date}}</b></div>
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($amalan as $name => $list_amalan)
                            <tr>
                                <th colspan="3"
                                    style="background-color: #F7F7F7;">{{ $name }}</th>
                            </tr>
                            @foreach ($list_amalan as $a)
                                <tr>
                                    <td>{{ $a->name }}</td>
                                </tr>
                            @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection