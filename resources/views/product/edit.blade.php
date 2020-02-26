@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
 
                {{-- @foreach ($products as $t) --}}
                <form action="{{ route('product.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $product->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $product->deskripsi }}">
                            </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Gambar</label>
                            <input type="file" name="gambar" class="form-control datepicker" id="exampleInputFile" autocomplete="off" value="{{ url($product->gambar) }}">
                            <hr>
                            @if (!empty($product->gambar))
                            <img src="{{asset($product->gambar)}}" alt="{{asset($product->gambar)}}" width="150px" height="150px">
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
 
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                {{-- @endforeach --}}
 
            </div>
        </div>
    </div>
</div>
 
@endsection