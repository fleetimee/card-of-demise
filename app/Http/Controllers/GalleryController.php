<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        return view('form-upload');
    }

    public function prosesUpload(Request $request) {
        $this->validate($request,[
            'berkas' => 'required',
            'caption' => 'required'
        ]);

        $gambar = $request->file('berkas');

        echo "Nama File : ".$gambar->getClientOriginalName();
        echo "<hr>";
        echo "Ekstensi File :".$gambar->getClientOriginalExtension();
        echo "<hr>";
        echo "File Real Path :".$gambar->getRealPath();
        echo "<hr>";
        echo "Ukuran File :".$gambar->getSize();
        echo "<hr>";
        echo "Tipe Mime :".$gambar->getMimeType();

        $folder_tujuan = 'uploads';
        $gambar->move($folder_tujuan, $gambar->getClientOriginalName());

    }
}
