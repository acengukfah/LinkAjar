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
    @php
        $tambah = 0;
        $kurang = 0;
        $tambah_old = 0;
        $kurang_old = 0;
        $total_old = 0;
        $rupiah_old = 0;
        $rupiah = 0;
        $jumlah = 0;
        $total = 0;
    @endphp
        @foreach ($kategori->barangs as $barang)
        <tr>
            @foreach ($barang->persediaans as $item)
                @foreach ($persediaans_old as $old)
                @if ($item->id == $old->id)
                    @if ($item->jenis_persediaan_id == 1 || $item->jenis_persediaan_id == 2 || $item->jenis_persediaan_id == 3)
                    @php
                            $tambah_old += $item->jumlah;
                            $rupiah_old += $item->total;
                            @endphp
                    @elseif($item->jenis_persediaan_id == 4)
                    @php
                            $kurang_old += $item->jumlah;
                            $rupiah_old -= $item->total;
                            @endphp
                    @endif
                @endif
                @endforeach
                @foreach ($persediaans as $persediaan)
                @if ($item->id == $persediaan->id)
                    @if ($item->jenis_persediaan_id == 1 || $item->jenis_persediaan_id == 2 || $item->jenis_persediaan_id == 3)
                    @php
                            $tambah += $item->jumlah;
                            $rupiah += $item->total;
                            @endphp
                    @elseif($item->jenis_persediaan_id == 4)
                    @php
                            $kurang += $item->jumlah;
                            $rupiah -= $item->total;
                            @endphp
                    @endif
                @endif
                @endforeach
            @endforeach
            @php
                $total = $total + ($tambah - $kurang);
                $total_old = $total_old + ($tambah_old - $kurang_old);
            @endphp
            <td>{{$barang->id}}</td>
            <td>{{$barang->nama}}</td>
            <td>{{$total_old}}</td>
            <td>{{$rupiah_old}}</td>
            <td>{{$tambah}}</td>
            <td>{{$kurang}}</td>
            <td>{{$total}}</td>
            <td>{{($total_old+$total)}}</td>
            <td>{{($rupiah_old + $rupiah)}}</td>
        </tr>
        @endforeach
    @endforeach
</table>
</html>