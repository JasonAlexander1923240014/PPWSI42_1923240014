<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tangga_lahir,
        alamat, created_at) values (?, ?, ?, ?, ?, ?)', ['1923240014', 'Jason', 'Palembang',
        '2001-07-07', 'Jl Mayor', now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Mamang"
        update_at = now() where npm = ?', ['1923240099'])
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?',
        ['1923240099']);
        dump($result);
    }

    public function select()
    {
        $result = DB::select('select * from mahasiswas');
        //dump($result);
        return view ('mahasiswa.index', ['all-mahasiswa' => $result]);
    }

}