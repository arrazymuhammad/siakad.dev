<?php

namespace App\Http\Controllers\Dosen\MataKuliah;

use App\Http\Controllers\Controller;
use App\Model\Tr\Ajar;
use App\Model\Tr\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_ajar)
    {
        $data['ajar'] = Ajar::with('pertemuan', 'pertemuan.tugas', 'pertemuan.tugas.pertemuan')->find($id_ajar);
        return view('dosen.matakuliah.tugas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_ajar)
    {
        $data['ajar'] = Ajar::find($id_ajar);
        return view('dosen.matakuliah.tugas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $id_ajar)
    {
        $tugas = new Tugas;
        $tugas->id_pertemuan = $req->id_pertemuan;
        $tugas->nama         = $req->nama;
        $tugas->desc         = $req->desc;
        // $tugas->url_file     = $_POST['url_file'];
        $tugas->deadline     = date("Y-m-d H:i:s", strtotime($req->deadline));
        $tugas->save();
        if($req->method) return redirect("matakuliah/$id_ajar/tugas")->with("msg_success", "Data Tugas Berhasil Ditambahkan");;
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ajar, $id)
    {
        $data['ajar'] = Ajar::find($id_ajar);
        $data['tugas'] = Tugas::find($id);
        return view('dosen.matakuliah.tugas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ajar, $id)
    {
        $tugas = Tugas::find($id);
        $tugas->nama         = $_POST['nama'];
        $tugas->desc         = $_POST['desc'];
        // $tugas->url_file     = $_POST['url_file'];
        $tugas->deadline     = date("Y-m-d H:i:s", strtotime($_POST['deadline']));
        $tugas->save();
        return redirect("matakuliah/$id_ajar/tugas")->with("msg_success", "Data Tugas Berhasil Diubah");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
