<?php

namespace App\Http\Controllers;

class DetailPesananCntroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout', 'register']]);
    }

    public function index()
    {
        $detail_pesanan = DetailPesanan::all();
        return response()->json($detail_pesanan);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'lingkar_dada' => 'required',
            'lingkar_pinggung' => 'required',
            'lingkar_pinggang' => 'required',
            'panjang_baju' => 'required',
            'panjang_lengan' => 'required',
            'panjang_celana' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        $detail_pesanan = DetailPesanan::create([
            'lingkar_dada' => request('lingkar_dada'),
            'lingkar_pinggung' => request('lingkar_pinggung'),
            'lingkar_pinggang' => request('lingkar_pinggang'),
            'panjang_baju' => request('panjang_baju'),
            'panjang_lengan' => request('panjang_lengan'),
            'panjang_celana' => request('panjang_celana'),
            'keterangan' => request('keterangan'),
            'gambar' => request('gambar'),
        ]);

        if($detail_pesanan) {
            return response()->json(['message' => 'Detail Pesanan Berhasil Dibuat']);
        } else {
            return response()->json(['message' => 'Detail Pesanan Gagal Dibuat']);
        }
    }

    public function show($id_detail_pesanans)
    {
        $detail_pesanan = DetailPesanan::find($id_detail_pesanans);
        if($detail_pesanan) {
            return response()->json($detail_pesanan);
        } else {
            return response()->json("Detail Pesanan Tidak Ditemukan");
        }
    }

    public function update(Request $request, $id_detail_pesanans)
    {
        //
    }

    public function destroy($id_detail_pesanans)
    {
        $detail_pesanan = DetailPesanan::find($id_detail_pesanans);
        $detail_pesanan->delete();
        return response()->json("Detail Pesanan Berhasil Dihapus");
    }
}

