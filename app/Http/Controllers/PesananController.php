<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $pesanan = Pesanan::all();
        return response()->json($pesanan);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_users_1' => 'required',
            'id_users_2' => 'required',
            'id_detail_pesanans' => 'required',
            'lingkar_dada' => 'required',
            'lingkar_pinggul' => 'required',
            'lingkar_pinggang' => 'required',
            'panjang_baju' => 'required',
            'panjang_lengan' => 'required',
            'panjang_celana' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        $pesanan = Pesanan::create([
            'id_users_1' => request('id_users_1'),
            'id_users_2' => request('id_users_2'),
            'id_detail_pesanans' => request('id_detail_pesanans'),
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

        if($pesanan) {
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
