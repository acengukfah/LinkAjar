<html>
<table>
    @if (count($persediaans) != 0)
    <tr>
        <td colspan="8" style="text-align:center">REGISTER TRANSAKSI HARIAN</td>
    </tr>
    <tr>
        <td colspan="8" style="text-align:center">{{$persediaans[0]->jenis_persediaan->nama}}</td>
    </tr>
    <tr>
        <td colspan="8" style="text-align:center">UNTUK PERIODE BULAN JANUARI 2011</td>
    </tr>
    <tr>
        <td colspan="8" style="text-align:center">UNTUK PERIODE BULAN JANUARI 2011</td>
    </tr>
    <tr>
        <th>NOMOR DOKUMEN</th>
        <th>TGL DOK</th>
        <th>TGL BUKU</th>
        <th>KODE BARANG</th>
        <th>NAMA BARANG</th>
        <th>JUMLAH</th>
        <th>HARGA SATUAN</th>
        <th>TOTAL</th>
    </tr>
    @php
        $total = 0;
    @endphp
    @foreach ($persediaans as $persediaan)
    <tr>
        <td>{{$persediaan->pembukuan->no_dokumen}}</td>
        <td>{{$persediaan->pembukuan->tgl_dokumen}}</td>
        <td>{{$persediaan->pembukuan->tgl_pembukuan}}</td>
        <td>{{$persediaan->barang_id}}</td>
        <td>{{$persediaan->barang->nama}}</td>
        <td>{{$persediaan->jumlah}}</td>
        <td>{{$persediaan->harga_satuan}}</td>
        <td>{{$persediaan->total}}</td>
        @php
        $total+= $persediaan->total;
        @endphp
    </tr>
    @endforeach
    <tr>
        <td colspan="7" style="text-align:center">JUMLAH {{$persediaans[0]->jenis_persediaan->nama}}</td>
        <td>{{$total}}</td>
    </tr>
    @else
    <tr>
        <td>Data Belum Ada</td>
    </tr>
    @endif
</table>
</html>