@extends('layout.master')

@section('content')
    <div class="container">
        <h4>Edit Buku</h4>
        @foreach($data_buku as $db)
        <form method="post" action="{{ route('buku.update', $db->id) }}">
        @csrf
            <div> Judul <input type="text" name="judul" value="{{ $db->judul }}"></div>
            <div>Penulis <input type="text" name="penulis" value="{{ $db->penulis }}"></div>
            <div>Harga <input type="text" name="harga" value="{{ $db->harga }}"></div>
            <div>Tgl. Terbit <input id="datepicker" type = "text" required="required" name="tgl_terbit" 
            value="{{ $db->tgl_terbit }}" class="form-control" placeholder = "yyyy/mm/dd"></div>
            <div><button type="submit">Update</button>
            <a href="/buku">Batal</a></div>
        </form>
        @endforeach
    </div>
@endsection