<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Carbon\Carbon;

class BeritaController extends Controller
{

    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'berita';
    }
    public function dataBerita()
    {
        $berita = $this->database->getReference($this->tableName)->getValue();
        if($berita == null){
            $berita = [];
        }
        return view('admin.databerita' , compact('berita'));
    }

    public function create()
    {
        return view('admin.tambah_berita'); 
    }

    public function update(Request $request, $id){
        $key = $id;
        $created_at = Carbon::today()->toDateString();
        $update_data = [
            'judul' => $request->judul,
            'link' => $request->link,
            'gambar' => $request->gambar,
            'tanggal_buat' => $created_at,
        ];
        $res_update_date = $this->database->getReference($this->tableName)->getChild($key)->set($update_data);
        //  $this->database->getReference($this->tableName, '/', $key)->update($update_data);
        if($res_update_date){
            return redirect()->route('dataBerita')->with('success', 'Data Berhasil Diupdate');
        }else{
            return redirect()->route('dataBerita')->with('error', 'Data Gagal Diupdate');
        }

    }

    public function delete($id){
        
        $delete_berita = $this->database->getReference($this->tableName)->getChild($id)->remove();
        if($delete_berita){
            return redirect()->route('dataBerita')->with('success', 'Berita berhasil dihapus');
        }else{
            return redirect()->route('dataBerita')->with('error', 'Berita gagal dihapus');
        }
    }
    

    public function edit($id){
        $key = $id;
        $edit_data = $this->database->getReference($this->tableName)->getChild($key)->getValue(); 
        if($edit_data){
            return view('admin.edit_berita', compact('edit_data' , 'key'));
        }else{
            return redirect()->route('dataBerita');
        }
        
    }

    public function strore(Request $request){
       
        $created_at = Carbon::today()->toDateString();
    
        $pos_data = [
            'judul' => $request->judul,
            'gambar' => $request->gambar,
            'link' => $request->link,
            'tanggal_buat' => $created_at,

        ];

        $post_ref = $this->database->getReference($this->tableName)->push($pos_data);
        if($post_ref->getKey() != null){
            return redirect('/berita')->with('success', 'Data Berhasil Ditambahkan');  
        }else{
            return redirect('/berita')->with('error', 'Data Gagal Ditambahkan');  
        }
    }
}
