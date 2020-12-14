@extends('layout/starter')

@section('title', 'Data Persediaan')
@section('header','Pembukuan')
@section('content')

@if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
@endif

<!-- Content Row -->
<div class="row mt-3">

  <!-- Content Column -->
  <div class="col-lg-12">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold color-gray">Data Pembukuan</h6>

        {{-- Tombol tambah kategori dengan modal --}}
        <button class="btn btn-link font-green font-bold d-sm-inline-block"
                data-toggle="modal" data-target="#modalTambahKategori">
                +Tambah Pembukuan
      </button>

        {{-- Modal tambah Detail --}}
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
            aria-labelledby="modalTambahBarang" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-bold color-gray font-18"
                            id="modalTambahBarang">Tambah Pembukuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/pembukuan" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- input Data Persediaan --}}
                           
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="no_dokumen">Nomor Dokumen</label>
                                <input type="text" class="form-control" id="no_dokumen" name="no_dokumen"
                                    placeholder="Nomor Dokumen" required>
                            </div>
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="no_bukti">Nomor Bukti</label>
                                <input type="text" class="form-control" id="no_bukti" name="no_bukti"
                                    placeholder="Nomor Bukti" required>
                            </div>
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="tgl_pembukuan">Tanggal Buku</label>
                                <input class="datepicker form-control" type="text" id="tgl_pembukuan" name="tgl_pembukuan">
                            </div>
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="tgl_dokumen">Tanggal Dokumen</label>
                                
                                <input class="datepicker date form-control" type="text" id="tgl_dokumen" name="tgl_dokumen">
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
                <th>Nomor Dokumen</th>
                <th>Nomor Bukti</th>
                <th>Tanggal Buku</th>
                <th>Tanggal Dokumen</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
                @php 
                $i = 1;  
                @endphp
            @foreach($pembukuans->sortByDesc('created_at') as $pembukuan)
              <tr>
                <td>{{$i}}</td>
                <td>{{$pembukuan->no_dokumen}}</td>
                <td>{{$pembukuan->no_bukti}}</td>
                <td>{{$pembukuan->tgl_pembukuan}}</td>
                <td>{{$pembukuan->tgl_dokumen}}</td>
                <td>
                    <button href="/pembukuan/edit/{{$pembukuan->id}}" class="btn btn-success bg-custom font-white d-sm-inline-block" data-toggle="modal" data-target="#modalEditBarang{{$pembukuan->id}}">Edit</button>
                    <a href="/pembukuan/delete/{{$pembukuan->id}}" class="btn btn-danger bg-danger font-white">Delete</a>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEditBarang{{$pembukuan->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modalEditBarang" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-bold color-gray font-18" id="modalEditBarang">Edit Kategori Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/pembukuan/update/{{$pembukuan->id}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        {{-- input data barang --}}
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray" for="no_dokumen">Nomor Dokumen</label>
                                            <input type="text" class="form-control" id="no_dokumen" name="no_dokumen"
                                                value="{{$pembukuan->no_dokumen}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray" for="no_bukti">Nomor Bukti</label>
                                            <input type="text" class="form-control" id="no_bukti" name="no_bukti" value="{{$pembukuan->no_bukti}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray" for="tgl_pembukuan">Tanggal Buku</label>
                                            <input class="datepicker form-control" type="text" id="tgl_pembukuan" name="tgl_pembukuan" value="{{$pembukuan->tgl_pembukuan}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray" for="tgl_dokumen">Tanggal Dokumen</label>
                                            <input class="datepicker date form-control" type="text" id="tgl_dokumen" name="tgl_dokumen" value="{{$pembukuan->tgl_dokumen}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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