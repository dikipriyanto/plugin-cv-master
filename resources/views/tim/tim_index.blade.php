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

        <form action="{{route('tim.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Isikan Nama" required>
            </div>

            <div class="form-group">
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Isikan Jabatan" required>
            </div>

            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="foto">
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tims as $t)
                    <tr>
                        <td>{{$t->nama}}</td>
                        <td>{{$t->jabatan}}</td>
                        <td><img width="100px" height="100px" src="{{ asset($t->foto) }}"></td>
                        <td>
                            <form action="{{route('tim.destroy', $t->id)}}" method="POST" style="">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('tim.edit',$t->id)}}" class="btn btn-warning btn-sm">
                                    <i class="zwicon-edit-pencil"></i>
                                </a>
                                
                            <button class="btn btn-danger btn-sm">
                                <i class="zwicon-trash"></i>
                            </button>
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
        $('#sb-tim').addClass("active");
    })

</script>

@endsection
