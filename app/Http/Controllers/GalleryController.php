<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index() {
        $galeri = Gallery::get();
        return view('form-upload', ['foto' => $galeri]);
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

        $nama_file = time()."_".$gambar->getClientOriginalName();
        $folder_tujuan = 'uploads';
        $gambar->move($folder_tujuan, $nama_file);

        Gallery::create([
            'gambar' => $nama_file,
            'caption' => $request->caption
        ]);

        return redirect()->back();


    }
}
