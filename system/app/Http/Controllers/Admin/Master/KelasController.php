<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Model\Rf\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = Kelas::all();
        return view('admin.master.kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $v_rules = ['angkatan' => 'required', 'nama' => 'required'];
        $v_msg   = [
        			'angkatan.required' => 'Angkatan tidak boleh kosong',
		          	'nama.required'    	=> 'Nama Kelas tidak boleh kosong',
		        ];
        $req->validate($v_rules, $v_msg);
        $kelas = Kelas::where('nama', $req->nama)
            ->where('angkatan', $req->angkatan)
            ->get();
        if ($kelas->count() == 0) {
            $kelas           = new Kelas;
            $kelas->nama     = $req->nama;
            $kelas->angkatan = $req->angkatan;
            $kelas->save();
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
