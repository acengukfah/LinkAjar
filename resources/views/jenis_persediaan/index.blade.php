@extends('layout/index')

@section('title', 'Jenis Persediaan')

@section('container')

@if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
@endif

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-12">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold color-gray">Data Jenis Persediaan</h6>

        {{-- Tombol tambah kategori dengan modal --}}
        <button class="btn btn-link font-green font-bold d-sm-inline-block"
                data-toggle="modal" data-target="#modalTambahKategori">
                +Tambah Jenis Persediaan
      </button>

        {{-- Modal tambah Barang --}}
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
            aria-labelledby="modalTambahBarang" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-bold color-gray font-18"
                            id="modalTambahBarang">Tambah Jenis Persediaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/jenis-persediaan" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- input data barang --}}
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="nama">Nama Jenis Persediaan</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Jenis Persediaan" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Jenis Persediaan</th>
                <th>Tanggal Buat</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
                @php 
                $i = 1;  
                @endphp
            @foreach($jenis_persediaans->sortByDesc('created_at') as $jenis_persediaan)
              <tr>
                <td>{{$i}}</td>
                <td>{{$jenis_persediaan->nama}}</td>
                <td>{{$jenis_persediaan->created_at}}</td>
                <td>
                    <button href="/jenis-persediaan/edit/{{$jenis_persediaan->id}}" class="btn btn-success bg-custom font-white d-sm-inline-block" data-toggle="modal" data-target="#modalEditBarang{{$jenis_persediaan->id}}">Edit</button>
                    <a href="/jenis-persediaan/delete/{{$jenis_persediaan->id}}" class="btn btn-danger bg-danger font-white">Delete</a>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEditBarang{{$jenis_persediaan->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modalEditBarang" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-bold color-gray font-18"
                                        id="modalEditBarang">Edit Jenis Persediaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/jenis-persediaan/update/{{$jenis_persediaan->id}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        {{-- input data barang --}}
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="namaBarang">Nama Jenis Persediaan</label>
                                            <input type="text" class="form-control" id="namaBarang" name="nama"
                                                value="{{$jenis_persediaan->nama}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>                
              </tr>
              @php $i++;  @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection