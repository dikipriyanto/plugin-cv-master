@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
{{--  
                @if(Session::has('sukses'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ Session::get('sukses') }}
                </div>
                @endif
 
                @if(Session::has('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    {{ Session::get('gagal') }}
                </div>
                @endif --}}
 
                {{-- @foreach ($tims as $t) --}}
                <form action="{{ route('Clients.update' , $Clients->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $Clients->nama_perusahaan }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Gambar</label>
                            <input type="file" name="logo" class="form-control datepicker" id="exampleInputFile" autocomplete="off" value="{{ url($Clients->logo) }}">
                            <hr>
                            @if (!empty($Clients->logo))
                            <img src="{{asset($Clients->logo)}}" alt="{{asset($Clients->logo)}}" width="150px" height="150px">
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