@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data TIM</h4>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br />
            @endforeach
        </div>
        @endif

        <form action="{{route('Clients.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Isikan Nama Perusahaan" required>
            </div>

            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="logo">
            </div>


            <input type="submit" value="Upload" class="btn btn-primary">
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive data-table">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Logo</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Clients as $t)
                    <tr>
                        <td>{{$t->nama_perusahaan}}</td>
                        <td><img width="100px" height="100px" src="{{ url($t->logo) }}"></td>
                        <td>
                            <form action="{{route('Clients.destroy', $t->id)}}" method="POST" style="">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('Clients.edit',$t->id)}}" class="btn btn-warning btn-sm">
                                    <i class="zwicon-edit-pencil"></i>
                                </a>

                            <button class="btn btn-danger" type="submit"><span class="zwicon-trash"></<span></button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#data-table').DataTable();
    });

    $(document).ready(function(){
        $('#sb-clients').addClass("active");
    })

</script>

@endsection
