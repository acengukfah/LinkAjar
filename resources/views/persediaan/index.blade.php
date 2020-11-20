@extends('layout/index')

@section('title', 'Data Persediaan')

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
        <h6 class="m-0 font-weight-bold color-gray">Data Persediaan</h6>

        {{-- Tombol tambah kategori dengan modal --}}
        <button class="btn btn-link font-green font-bold d-sm-inline-block"
                data-toggle="modal" data-target="#modalTambahKategori">
                +Tambah Persediaan
      </button>

        {{-- Modal tambah Detail --}}
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog"
            aria-labelledby="modalTambahBarang" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-bold color-gray font-18"
                            id="modalTambahBarang">Tambah Persediaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="persediaan" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- input Data Persediaan --}}
                           
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="no_dokumen">Nomor Dokumen</label>
                                <input type="number" class="form-control" id="no_dokumen" name="no_dokumen"
                                    placeholder="Nomor Dokumen" required>
                            </div>
                            <div class="form-group">
                                <label class="font-18 font-medium color-gray"
                                    for="no_bukti">Nomor Bukti</label>
                                <input type="number" class="form-control" id="no_bukti" name="no_bukti"
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

                            <div class="form-group">
                                <label class="font-18 font-medium color-gray" for="detail_id">Nama Barang - Jumlahnya</label>
                            
                                <select class="custom-select" id="detail_id" name="detail_id">
                                    <option selected>Pilih Barang dan Jumlahnya</option>
                                    @foreach ($persediaans as $persediaan)
                                    <option value="{{$persediaan->id}}">{{$persediaan->detail->barang->nama}} - {{$persediaan->detail->jumlah}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-18 font-medium color-gray" for="jenis_persediaan_id">Jenis Persediaan</label>
                            
                                <select class="custom-select" id="jenis_persediaan_id" name="jenis_persediaan_id">
                                    <option selected>Pilih Jenis Persediaan</option>
                                    @foreach ($jenis_persediaans as $jenis_persediaan)
                                        <option value="{{$jenis_persediaan->id}}">{{$jenis_persediaan->nama}}</option>
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
                <th>Nomor Dokumen</th>
                <th>Nomor Bukti</th>
                <th>Tanggal Buku</th>
                <th>Tanggal Dokumen</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Jenis Persediaan</th>
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
                <td>{{$persediaan->no_dokumen}}</td>
                <td>{{$persediaan->no_bukti}}</td>
                <td>{{$persediaan->tgl_pembukuan}}</td>
                <td>{{$persediaan->tgl_dokumen}}</td>
                <td>{{$persediaan->detail->barang->nama}}</td>
                <td>{{$persediaan->detail->jumlah}}</td>
                <td>{{$persediaan->jenis_persediaan->nama}}</td>
                <td>{{$persediaan->detail->total}}</td>
                <td>
                    <button href="persediaan/edit/{{$persediaan->id}}" class="btn btn-success bg-custom font-white d-sm-inline-block" data-toggle="modal" data-target="#modalEditBarang{{$persediaan->id}}">Edit</button>
                    <a href="persediaan/delete/{{$persediaan->id}}" class="btn btn-danger bg-danger font-white">Delete</a>

                    {{-- Modal Edit --}}
                    
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