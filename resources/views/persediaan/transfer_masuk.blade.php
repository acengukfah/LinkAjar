@extends('layout/starter')

@section('title', 'Detail Persediaan')
@section('header','Persediaan Masuk - Transfer Masuk')
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
                <h6 class="m-0 font-weight-bold color-gray">Data Persediaan</h6>

                {{-- Tombol tambah kategori dengan modal --}}
                <button class="btn btn-link font-green font-bold d-sm-inline-block" data-toggle="modal"
                    data-target="#modalTambahKategori">
                    +Tambah Persediaan
                </button>

                {{-- Modal tambah Detail --}}
                <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
                    aria-labelledby="modalTambahBarang" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-bold color-gray font-18" id="modalTambahBarang">Tambah
                                    Persediaan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/persediaan" method="POST">
                                @csrf
                                <div class="modal-body">
                                    {{-- input Detail Persediaan --}}
                                    <div class="form-group">
                                        <label class="font-18 font-medium color-gray" for="namaBarang">Nama
                                            Barang</label>

                                        <select class="custom-select" id="namaBarang" name="barang_id">
                                            <option selected>Pilih Nama Barang</option>
                                            @foreach ($barangs as $barang)
                                            <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="font-18 font-medium color-gray" for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                                            placeholder="Jumlah" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-18 font-medium color-gray" for="harga_satuan">Harga
                                            Satuan</label>
                                        <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                            placeholder="Harga Satuan" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-18 font-medium color-gray" for="pembukuan_id">Tanggal Dokumen
                                            dan Tanggal Pembukuan</label>

                                        <select class="custom-select" id="pembukuan_id" name="pembukuan_id">
                                            <option selected>Pilih Tanggal Dokumen dan Tanggal Pembukuan</option>
                                            @foreach ($pembukuans as $pembukuan)
                                            <option value="{{$pembukuan->id}}">{{$pembukuan->tgl_dokumen}} dan
                                                {{$pembukuan->tgl_pembukuan}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-18 font-medium color-gray" for="jenis_persediaan_id">Jenis
                                            Persediaan</label>

                                        <select class="custom-select" id="jenis_persediaan_id"
                                            name="jenis_persediaan_id">
                                            <option value="3" selected disabled>Persediaan Masuk - Transfer Masuk
                                            </option>
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
                                <th>Tanggal Dokumen</th>
                                <th>Tanggal Pembukuan</th>
                                <th>Jenis Persediaan</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($persediaans->sortByDesc('created_at') as $persediaan)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$persediaan->barang->nama}}</td>
                                <td>{{$persediaan->pembukuan->tgl_dokumen}}</td>
                                <td>{{$persediaan->pembukuan->tgl_pembukuan}}</td>
                                <td>{{$persediaan->jenis_persediaan->nama}}</td>
                                <td>{{$persediaan->jumlah}}</td>
                                <td>{{$persediaan->harga_satuan}}</td>
                                <td>{{$persediaan->total}}</td>
                                <td>
                                    <button href="/persediaan/edit/{{$persediaan->id}}"
                                        class="btn btn-success bg-custom font-white d-sm-inline-block"
                                        data-toggle="modal"
                                        data-target="#modalEditBarang{{$persediaan->id}}">Edit</button>
                                    <a href="/persediaan/delete/{{$persediaan->id}}"
                                        class="btn btn-danger bg-danger font-white">Delete</a>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="modalEditBarang{{$persediaan->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="modalEditBarang" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-bold color-gray font-18"
                                                        id="modalEditBarang">Edit Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/persediaan/update/{{$persediaan->id}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        {{-- input Detail Persediaan --}}
                                                        <div class="form-group">
                                                            <label class="font-18 font-medium color-gray"
                                                                for="namaBarang">Nama Barang</label>
                                                            <select class="custom-select" id="namaBarang"
                                                                name="barang_id">
                                                                <option selected>Pilih Nama Barang</option>
                                                                @foreach ($barangs as $barang)
                                                                @if ($persediaan->barang->nama == $barang->nama)
                                                                <option value="{{$barang->id}}" selected>
                                                                    {{$barang->nama}}</option>
                                                                @else
                                                                <option value="{{$barang->id}}">{{$barang->nama}}
                                                                </option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="font-18 font-medium color-gray"
                                                                for="jumlah">Jumlah</label>
                                                            <input type=numbert" class="form-control" id="jumlah"
                                                                name="jumlah" value="{{$persediaan->jumlah}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="font-18 font-medium color-gray"
                                                                for="harga_satuan">Harga Satuan</label>
                                                            <input type="number" class="form-control" id="harga_satuan"
                                                                name="harga_satuan"
                                                                value="{{$persediaan->harga_satuan}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="font-18 font-medium color-gray"
                                                                for="namaBarang">Tanggal Dokumen - Tanggal
                                                                Pembukuan</label>

                                                            <select class="custom-select" id="namaBarang"
                                                                name="barang_id">
                                                                <option selected>Pilih Tanggal Dokumen - Tanggal
                                                                    Pembukuan</option>
                                                                @foreach ($pembukuans as $pembukuan)
                                                                @if ($persediaan->pembukuan->id == $pembukuan->id)
                                                                <option value="{{$pembukuan->id}}" selected>
                                                                    {{$pembukuan->tgl_dokumen}} -
                                                                    {{$pembukuan->tgl_pembukuan}}</option>
                                                                @else
                                                                <option value="{{$pembukuan->id}}">
                                                                    {{$pembukuan->tgl_dokumen}} -
                                                                    {{$pembukuan->tgl_pembukuan}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="font-18 font-medium color-gray"
                                                                for="namaBarang">Jenis Persediaan/label>

                                                                <select class="custom-select" id="namaBarang"
                                                                    name="barang_id">
                                                                    <option selected>Pilih Jenis Persediaan/option>
                                                                        @foreach ($jenis_persediaans as
                                                                        $jenis_persediaan)
                                                                        @if ($persediaan->jenis_persediaan->id ==
                                                                        $jenis_persediaan->id)
                                                                    <option value="{{$jenis_persediaan->id}}" selected>
                                                                        {{$jenis_persediaan->nama}}</option>
                                                                    @else
                                                                    <option value="{{$jenis_persediaan->id}}">
                                                                        {{$jenis_persediaan->nama}}</option>
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
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection