<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class BeritaController extends Controller
{

    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'berita';
    }
    public function dataBerita()
    {
        return view('admin.databerita'); 
    }

    public function create()
    {
        return view('admin.tambah_berita'); 
    }

    public function strore(Request $request){

        
        $pos_data = [
            'judul' => $request->judul,
            'gambar' => $request->gambar,
            'tanggal_buat' => $request->tanggal_buat,

        ];

        $post_ref = $this->database->getReference($this->tableName)->push($pos_data);
        if($post_ref->getKey() != null){
            return redirect('/berita')->with('success', 'Data Berhasil Ditambahkan');  
        }else{
            return redirect('/berita')->with('error', 'Data Gagal Ditambahkan');  
        }
    }
}
