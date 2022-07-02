<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pesanan;
use App\Models\DetailPesanan;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout', 'register']]);
    }

    public function index()
    {
        $pesanan = DB::table('pesanans')
        ->select('pesanans.id_pesanans', 'pesanans.id_users_1', 'pesanans.id_users_2', 'detail_pesanans.lingkar_dada', 'detail_pesanans.lingkar_pinggul', 'detail_pesanans.lingkar_pinggang', 'detail_pesanans.panjang_baju', 'detail_pesanans.panjang_lengan', 'detail_pesanans.panjang_celana', 'detail_pesanans.keterangan', 'detail_pesanans.gambar')
        ->join('detail_pesanans', 'detail_pesanans.id_detail_pesanans', '=', 'pesanans.id_detail_pesanans')
        ->join('users', 'users.id_users', '=', 'pesanans.id_users_1')
        ->get();
        return response()->json($pesanan);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_users_1' => 'required',
            'id_users_2' => 'required',
            'lingkar_dada' => 'required',
            'lingkar_pinggul' => 'required',
            'lingkar_pinggang' => 'required',
            'panjang_baju' => 'required',
            'panjang_lengan' => 'required',
            'panjang_celana' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        $detail_pesanan = DetailPesanan::create([
            'lingkar_dada' => request('lingkar_dada'),
            'lingkar_pinggul' => request('lingkar_pinggul'),
            'lingkar_pinggang' => request('lingkar_pinggang'),
            'panjang_baju' => request('panjang_baju'),
            'panjang_lengan' => request('panjang_lengan'),
            'panjang_celana' => request('panjang_celana'),
            'keterangan' => request('keterangan'),
            'gambar' => request('gambar'),
        ]);

        $detail = DetailPesanan::latest('id_detail_pesanans')->first();

        $pesanan = Pesanan::create([
            'id_users_1' => request('id_users_1'),
            'id_users_2' => request('id_users_2'),
            'id_detail_pesanans' => $detail->id_detail_pesanans,
        ]);

        $pembayaran = History::create([
            'id_pesanans' => $pesanan->id_pesanans,
            'status' => 'Belum Dibayar'
        ]);

        if($pembayaran) {
            return response()->json(['message' => 'Pesanan Berhasil Dibuat']);
        } else {
            return response()->json(['message' => 'Pesanan Gagal Dibuat']);
        }
    }

    public function show($id_pesanans)
    {
        $pesanan = Pesanan::find($id_pesanans);
        if($pesanan) {
            return response()->json($pesanan);
        } else {
            return response()->json("Pesanan Tidak Ditemukan");
        }
    }

    public function update(Request $request, $id_pesanans)
    {
        //
    }

    public function destroy($id_pesanans)
    {
        $pesanan = Pesanan::find($id_pesanans);
        $pesanan->delete();
        return response()->json("Pesanan Berhasil Dihapus");
    }
}
