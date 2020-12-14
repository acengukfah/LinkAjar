@extends('layout/starter')

@section('title', 'Data Barang')

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
        <h6 class="m-0 font-weight-bold color-gray">Data Barang</h6>

        {{-- Tombol tambah kategori dengan modal --}}
        <button class="btn btn-link font-green font-bold d-sm-inline-block"
                data-toggle="modal" data-target="#modalTambahKategori">
                +Tambah Barang
      </button>

        {{-- Modal tambah Barang --}}
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
            aria-labelledby="modalTambahBarang" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-bold color-gray font-18"
                            id="modalTambahBarang">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/barang" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- input data barang --}}
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="namaBarang">Nama Barang</label>
                                <input type="text" class="form-control" id="namaBarang" name="nama"
                                    placeholder="Nama Barang" required>
                            </div>

                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="kategori_id">Kategori</label>
                                <select class="custom-select" id="namaBarang" name="kategori_id">
                                    <option selected>Pilih Kategori Barang</option>
                                    @foreach ($kategori_barangs as $kategori_barang)
                                    <option value="{{$kategori_barang->id}}">{{$kategori_barang->nama}}</option>
                                    @endforeach
                                </select>
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
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Kategori</th>
                <th>Tanggal Buat</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
                @php 
                $i = 1;  
                @endphp
            @foreach($barangs->sortByDesc('created_at') as $barang)
              <tr>
                <td>{{$i}}</td>
                <td>{{$barang->nama}}</td>
                <td>{{$barang->keterangan}}</td>
                <td>{{$barang->kategori->nama}}</td>
                <td>{{$barang->created_at}}</td>
                <td>
                    <button href="/barang/edit/{{$barang->id}}" class="btn btn-success bg-custom font-white d-sm-inline-block" data-toggle="modal" data-target="#modalEditBarang{{$barang->id}}">Edit</button>
                    <a href="/barang/delete/{{$barang->id}}" class="btn btn-danger bg-danger font-white">Delete</a>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEditBarang{{$barang->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modalEditBarang" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-bold color-gray font-18"
                                        id="modalEditBarang">Edit Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/barang/update/{{$barang->id}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        {{-- input data barang --}}
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="namaBarang">Nama Barang</label>
                                            <input type="text" class="form-control" id="namaBarang" name="nama"
                                                value="{{$barang->nama}}">
                                        </div>
            
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="keterangan">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                                value="{{$barang->keterangan}}">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="kategori_id">Kategori</label>
                                            <select class="custom-select" id="namaBarang" name="kategori_id">
                                                <option selected>Pilih Kategori Barang</option>
                                                @foreach ($kategori_barangs as $kategori_barang)
                                                    @if ($barang->kategori->nama == $kategori_barang->nama)
                                                        <option value="{{$kategori_barang->id}}" selected>{{$kategori_barang->nama}}</option>
                                                    @else
                                                        <option value="{{$kategori_barang->id}}">{{$kategori_barang->nama}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
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