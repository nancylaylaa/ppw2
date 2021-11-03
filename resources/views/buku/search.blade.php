<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <h3>Daftar Buku Novel</h3>
    </head>
    <body>
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{Session::get('pesan')}}</div>
        @endif
        <form action="{{ route('buku.create') }}">
            <button class="btn btn-info">Tambah buku</button>
        </form>
        <form action="{{ route('buku.search') }}" method="get">
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; 
            display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ number_format($buku->harga, 0, ',', '.') }}</td>
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('buku.edit', $buku->id) }}" method="post">
                            @csrf
                            <button class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <!-- <tr>
                    <td colspan='4'>Total Buku</td>
                    <td>{{ $jumlah }}</td>
                </tr>
                <tr>
                    <td colspan='4'>Total Harga</td>
                    <td>{{ "Rp ".number_format($total, 2, ',', '.') }}</td>
                </tr> -->
            </tbody>
        </table>
        <div>{{ $data_buku->links() }}</div>
        @if(count($data_buku))
            <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> 
            data dengan kata: <strong>{{ $cari }}</strong></div>
        @else
            <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
            <a href="/buku" class="btn btn-warning">Kembali</a></div>
        @endif
    </body>
</html>