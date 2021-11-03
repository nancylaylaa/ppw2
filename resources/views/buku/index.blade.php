<html>
    <head>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Klee+One&family=Righteous&display=swap" rel="stylesheet">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D3D3D3;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=876&q=80" width = "60" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">About</a>
                </li>
                <!-- <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Fiksi</a></li>
                    <li><a class="dropdown-item" href="#">Non-Fiksi</a></li>
                    <li><a class="dropdown-item" href="#">Ilmiah</a></li>
                    <li><a class="dropdown-item" href="#">Komik</a></li>
                </ul>
                </li> -->
                <li class="nav-item">
                <a class="nav-link active" href="#">Contact Us</a>
                </li>
            </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
            </div>
        </div>
        </nav>
        <!-- navbar end -->
        <br>
        <h3 class="text-center">Daftar Buku Novel</h3>
    </head>
    <body>
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{Session::get('pesan')}}</div>
        @endif
        <!-- <form action="{{ route('buku.create') }}">
            <button class="btn btn-info">Tambah buku</button>
        </form> -->
        <!-- <form action="{{ route('buku.search') }}" method="get">
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; 
            display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
        </form> -->
        <form action="{{ route('buku.search') }}" method="get">
            @if(Auth::check() && Auth::user()->level=='admin')
                <button class="btn btn-info">Tambah buku</button>
            @endif
            <input class="form-control me-2" type="text" name="kata" type="search" placeholder="Search" aria-label="Search" style="width: 30%; display: inline;">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    @if(Auth::check() && Auth::user()->level=='admin')
                        <th colspan='2'>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp".number_format($buku->harga, 0, ',', '.') }}</td>
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    @if(Auth::check() && Auth::user()->level=='admin')
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
                    @endif
                </tr>
                @endforeach
                <tr>
                    <td colspan='4'>Total Buku</td>
                    <td>{{ $jumlah }}</td>
                </tr>
                <tr>
                    <td colspan='4'>Total Harga</td>
                    <td>{{ "Rp".number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <div>{{ $data_buku->links() }}</div>
    </body>
</html>