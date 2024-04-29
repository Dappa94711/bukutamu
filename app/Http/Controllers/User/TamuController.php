<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TamuController extends Controller
{
    public function simpanTamu(Request $request){
        $nama = $request->nama;
        $telepon = $request->telepon;
        $alamat = $request->alamat;
        $email = $request->email;
        $kategori = $request->kategori;
        $keperluan = $request->keperluan;
        $tanggal = $request->tanggal;

        $data = new BukuTamu();
        $data->nama = $nama;
        $data->tlp = $telepon;
        $data->alamat = $alamat;
        $data->email = $email;
        $data->kategori = $kategori;
        $data->keperluan = $keperluan;
        $data->password = Hash::make('rahasia');
        $data->save();

        return redirect('/')->with('status', 'Terimakasih Sudah Mengisi Data ;)');
    }
}