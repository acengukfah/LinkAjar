<html>
<table>
    <tr>
        <td colspan="8" style="text-align:center">REGISTER TRANSAKSI HARIAN</td>
    </tr>
    <tr>
        <td colspan="8" style="text-align:center">PERSEDIAAN KELUAR (TRANSFER)</td>
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
        <th>KETERANGAN</th>
    </tr>
    @foreach ($persediaans as $persediaan)
    <tr>
        <td>{{$persediaan->pembukuan->no_dokumen}}</td>
        <td>{{$persediaan->pembukuan->tgl_dokumen}}</td>
        <td>{{$persediaan->pembukuan->tgl_pembukuan}}</td>
        <td>{{$persediaan->barang_id}}</td>
        <td>{{$persediaan->barang->nama}}</td>
        <td>{{$persediaan->jumlah}}</td>
        <td>{{$persediaan->keterangan}}</td>
    </tr>
    @endforeach
</table>
</html>