<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;


class DashboardController extends Controller
{


    public function __construct(Database $database){
        $this->database = $database;
        $this->tableBerita = 'berita';
        $this->tableLaporan = 'Laporan';
        
    }
    public function index()
    {
        $berita = $this->database->getReference($this->tableBerita)->getValue();
        $jberita = count($berita);
        $laporan = $this->database->getReference($this->tableLaporan)->getValue();
        $jlaporan = count($laporan);
        return view('admin.index', compact('jlaporan', 'jberita')); 
    }
}
