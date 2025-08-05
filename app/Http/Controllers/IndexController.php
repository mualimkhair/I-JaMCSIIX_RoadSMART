<?php

namespace App\Http\Controllers;

use App\Models\Rencana;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        return view('welcome', [
            'judul' => 'Selamat Datang',
            // 'data_rencana' => Rencana::all(),
            'data_rencana' => Rencana::all()->sortByDesc(['presentase', 'nilai']),
        ]);
    }
}
