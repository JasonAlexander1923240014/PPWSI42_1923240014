<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Mahasiswa;

class MahasiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json([
            "data" => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new mahasiswa();
        $mahasiswa->npm = $request->npm; // = $_POST['npm']
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        return response()->json([
            "status"=>true,
            "message" => "Mahasiswa berhasil disimpan",
            //"data" => $mahasiswa;
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa){
            return response()->json([
                "status"=>true,
                "data" => $mahasiswa
            ]);
        }else{
            return response()->json([
                "status" => false,
                "data" => "Data mahasiswa tidak ada!!!"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->npm = $request->npm; // = $_POST['npm']
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        return response()->json([
            "status"=>true,
            "message" => "Mahasiswa berhasil diupdate",
            //"data" => $mahasiswa;
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);//cari data
        if($mahasiswa){                 //jika ada
            $mahasiswa->delete();
            $result = [
                "status" => true,
                "message" => "Mahasiswa berhasil dihapus Oi"
            ];
        }
        return response()->json($result);
    }
}
