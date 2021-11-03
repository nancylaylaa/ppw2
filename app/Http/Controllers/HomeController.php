<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $batas = 3;
        $jumlah = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $total = Buku::sum('harga');
        return view('buku.index', compact('no','data_buku','jumlah','total'));
    }
}
