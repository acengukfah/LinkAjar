@extends('layout/index')

@section('title', 'Detail Persediaan')

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
        <h6 class="m-0 font-weight-bold color-gray">Detail Persediaan</h6>

        {{-- Tombol tambah kategori dengan modal --}}
        <button class="btn btn-link font-green font-bold d-sm-inline-block"
                data-toggle="modal" data-target="#modalTambahKategori">
                +Tambah Detail
      </button>

        {{-- Modal tambah Detail --}}
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
            aria-labelledby="modalTambahBarang" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-bold color-gray font-18"
                            id="modalTambahBarang">Tambah Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/detail" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- input Detail Persediaan --}}
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="namaBarang">Nama Barang</label>

                                <select class="custom-select" id="namaBarang" name="barang_id">
                                    <option selected>Pilih Nama Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                                
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Jumlah" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="harga_satuan">Harga Satuan</label>
                                <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                    placeholder="harga_satuan" required>
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
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Tanggal Buat</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
                @php 
                $i = 1;  
                @endphp
            @foreach($details->sortByDesc('created_at') as $detail)
              <tr>
                <td>{{$i}}</td>
                <td>{{$detail->barang->nama}}</td>
                <td>{{$detail->jumlah}}</td>
                <td>{{$detail->harga_satuan}}</td>
                <td>{{$detail->created_at}}</td>
                <td>
                    <button href="/detail/edit/{{$detail->id}}" class="btn btn-success bg-custom font-white d-sm-inline-block" data-toggle="modal" data-target="#modalEditBarang{{$detail->id}}">Edit</button>
                    <a href="/detail/delete/{{$detail->id}}" class="btn btn-danger bg-danger font-white">Delete</a>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEditBarang{{$detail->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modalEditBarang" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-bold color-gray font-18"
                                        id="modalEditBarang">Edit Detail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/detail/update/{{$detail->id}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        {{-- input Detail Persediaan --}}
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="namaBarang">Nama Barang</label>
                                            <select class="custom-select" id="namaBarang" name="barang_id">
                                                <option selected>Pilih Nama Barang</option>
                                                @foreach ($barangs as $barang)
                                                    @if ($detail->barang->nama == $barang->nama)
                                                        <option value="{{$barang->id}}" selected>{{$barang->nama}}</option>
                                                    @else
                                                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

            
                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="jumlah">Jumlah</label>
                                            <input type=numbert" class="form-control" id="jumlah" name="jumlah"
                                                value="{{$detail->jumlah}}">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-18 font-medium color-gray"
                                                for="harga_satuan">Harga Satuan</label>
                                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                                value="{{$detail->harga_satuan}}">
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