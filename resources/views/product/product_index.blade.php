@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">DATA PRODUCT</h4>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br />
            @endforeach
        </div>
        @endif

        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Isikan Nama" required>
            </div>

            <div class="form-group">
                <label for="">Deskrisi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Isikan deskripsi" required>
            </div>

            <div class="form-group">
                <label for="">Gambar</label><br>
                <input type="file" name="logo">
            </div>


            <input type="submit" value="Upload" class="btn btn-primary">
        </form>
        <br>


        <div class="table-responsive data-table">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $t)
                    <tr>
                        <td>{{$t->nama}}</td>
                        <td>{{$t->deskripsi}}</td>
                        <td><img width="100px" height="100px" src="{{ url($t->gambar) }}"></td>
                        <td>
                            <form action="{{route('product.destroy', $t->id)}}" method="POST" style="">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('product.edit',$t->id)}}" class="btn btn-warning btn-sm">
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
        $('#sb-product').addClass("active");
    })

</script>

@endsection
