<html>
<table border="1">
    <tr>
        <td colspan="9" style="text-align:center">LAPORAN MUTASI BARANG PERSEDIAAN</td>
    </tr>
    <tr>
        <td colspan="9" style="text-align:center">UNTUK PERIODE YANG BERAKHIR TANGGAL 30 JUNI 2011</td>
    </tr>
    <tr>
        <td colspan="9" style="text-align:center">TAHUN ANGGARAN 2011</td>
    </tr>
    <tr>
        <th rowspan="3">KODE</th>
        <th rowspan="3">URAIAN</th>
        <th colspan="2">NILAI</th>
        <th colspan="3">MUTASI</th>
        <th colspan="2">NILAI</th>
    </tr>
    <tr>
        <th colspan="2">S/D 31 DESEMBER 2010</th>
        <th colspan="3"></th>
        <th colspan="2">S/D 30 JUNI 2011</th>
    </tr>
    <tr>
        <th>JUMLAH</th>
        <th>RUPIAH</th>
        <th>TAMBAH</th>
        <th>KURANG</th>
        <th>JUMLAH</th>
        <th>JUMLAH</th>
        <th>RUPIAH</th>
    </tr>
    @foreach ($kategori_barangs as $kategori)
    <tr>
        <td></td>
        <td>{{$kategori->nama}}</td>
        <td colspan="2">0</td>
        <td colspan="3"></td>
        <td colspan="3">0</td>
    </tr>
    {{-- @php
        $tambah = 0;
        $kurang = 0;
        $total = 0;
    @endphp --}}
        @foreach ($kategori->barangs as $barang)
        <tr>
            {{-- @foreach ($barang->persediaans as $item)
                @if ($item->jenis_persediaan_id == 1 || $item->jenis_persediaan_id == 2 || $item->jenis_persediaan_id == 3)
                    @php
                        $tambah += 1;
                    @endphp
                @elseif($item->jenis_persediaan_id == 4)
                    @php
                        $kurang += 1;
                    @endphp
                @endif
            @endforeach
            @php
                $total = $total + ($tambah - $kurang);
            @endphp --}}
            <td>{{$barang->id}}</td>
            <td>{{$barang->nama}}</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        @endforeach
    @endforeach
</table>
</html>