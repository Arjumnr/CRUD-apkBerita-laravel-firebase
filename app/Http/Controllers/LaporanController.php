<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;


class LaporanController extends Controller
{

    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'Laporan';
    }

    public function laporan(){
        return view('admin.laporan.laporan');
    }

    public function laporan_data(){
        $laporan = $this->database->getReference('Laporan')->getValue();
        if($laporan == null){
            $laporan = [];
        }
        return view('admin.laporan.laporan' , compact('laporan'));
    }

    public function cekBerita(Request $request, $idd){
        $key = $idd;
       
        $input = [];
        $input['status']=$request->cekBerita;
       
        $res_update_date = $this->database->getReference($this->tableName)->getChild($key)->update($input);
        if($res_update_date){
            return redirect()->route('laporan_data')->with('success', 'Data Berhasil Diupdate');
        }

    }

    public function cek(){
        $laporan = $this->database->getReference('Laporan')->getValue();
        if($laporan == null){
            $laporan = [];
        }
        return view('admin.laporan.cek' , compact('laporan'));
    }

    
}
