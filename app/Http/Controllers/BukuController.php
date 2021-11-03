<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan kode berikut untuk memanggil model buku yang sudah dibuat
use App\Buku;

class BukuController extends Controller
{
    /**
     *fungsi index
     */
    public function index()
    {
        //$data_buku = Buku::all()->sortByDesc('id');
        //$no = 0;
        //$total_buku = count($data_buku);
        //$total_harga = Buku::all()->sum('harga');

        //$batas = 1;
        //$jumlah_buku = Buku::count();
        //$data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        //$nomor = $batas * ($data_buku->currentPage() - 1);
        //return view('buku.index', compact('data_buku', 'no', 'nomor', 'total_buku', 'total_harga', 'jumlah buku'));
        $batas = 3;
        $jumlah = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $total = Buku::sum('harga');
        return view('buku.index', compact('no','data_buku','jumlah','total'));
    }


    public function search(Request $request)
    {
        $batas = 3;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis', 'like', "%".$cari."%")->paginate($batas);
        $jumlah = Buku::count();
        $no = $batas * ($data_buku->currentPage() - 1);
        $total = Buku::sum('harga');
        return view('buku.search', compact('no','data_buku','jumlah','cari', 'total'));
    }
    /**
     *fungsi create
     */

    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $this->validate($request,[
            'judul'=>'required|string',
            'penulis'=>'required|string|max:30',
            'harga'=>'required|numeric',
            'tgl_terbit'=>'required|date'
        ]);
        $buku->save();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_buku = Buku::where('id', $id)->get();
        return view('buku.edit', compact('data_buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->update();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Hapus');;
    }
}
