@extends('layouts.master')
@section('content')


<section>
    <header class="content__title">
        <h1>Data Tables</h1>
    </header>

    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            <i class="zwicon-plus-square"></i>
              </button>
            <div class="table-responsive data-table">
                <table id="data-table" class="table" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 50px">No</th>
                            <th>Nama Projek</th>
                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    <tbody>
                        @forelse ($projek as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama_projek }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" style="text-align: center"> Tidak ada data!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label>Tanggal Input</label>
                    <input type="date" class="form-control" placeholder="masukan tanggal">
                </div>

                <div class="form-group">
                    <label>Nama Projek</label>
                    <input type="text" class="form-control" placeholder="masukan nama projek">
                </div>

                <div class="form-group">
                    <label>Instansi/Orang</label>
                    <input type="text" class="form-control" placeholder="masukan nama instansi/orang">
                </div>

                <div class="form-group">
                    <label>MOU/Proposal</label>
                    <input type="file" value="Upload" class="form-control" placeholder="masukan MOU/Proposal">
                </div>

                <div class="form-group">
                    <label>Tanggal Pengerjaan</label>
                    <input type="date" class="form-control" placeholder="masukan tanggal pengerjaan">
                </div>

                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" class="form-control" placeholder="masukan tanggal selesai">
                </div>

                <div class="form-group">
                    <label>Nama Penerima Projek</label>
                    <input type="text" class="form-control" placeholder="masukan nama penerima projek">
                </div>
                <div class="form-group">
                    <label>Nama Penerima Projek</label>
                    <input type="text" class="form-control" placeholder="masukan nama penerima projek">
                </div>
                <div class="form-group">
                    <label>Penanggung Jawab</label>
                    <input type="text" class="form-control" placeholder="masukan nama penanggung jawab">
                </div>
                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function () {
        $('#data-table').DataTable();
    });

    $(document).ready(function () {
        $('#sb-projek').addClass("active");
    });

</script>



@endsection
