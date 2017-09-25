<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Model\Ms\Dosen;
use App\Model\Ms\User;
use Hash;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dosen'] = Dosen::all();
        return view('admin.master.dosen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $v_rules = ['nik' => 'required|unique:ms_dosen', 'nama' => 'required'];
        $v_msg   = [
            'nik.required'  => 'NIK tidak boleh kosong',
            'nik.unique'    => 'NIK tersebut sudah terdaftar',
            'nama.required' => 'Nama Dosen tidak boleh kosong',
        ];
        $req->validate($v_rules, $v_msg);
        $user           = new User;
        $user->level    = 2;
        $user->userid   = $req->userid;
        $user->password = Hash::make($req->password);
        $user->id_card  = $req->id_card;
        $user->pin      = substr($req->id_card, -4);
        $user->save();

        $dosen           = new Dosen();
        $dosen->nik      = $req->nik;
        $dosen->nama     = $req->nama;
        $dosen->id_user  = $user->id;
        $dosen->save();

        return redirect()->back()->with("msg_success", "Data Dosen Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['dosen'] = Dosen::find($id);
        return view('admin.master.dosen.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['dosen'] = Dosen::find($id);
        return view('admin.master.dosen.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $dosen = Dosen::find($id);
        $v_rules = [
                    'nik' => 'required|unique:ms_dosen,nik,'.$id,
                    'nama' => 'required',
                    'userid' => 'required|unique:ms_user,userid,'.$dosen->user->id,

            ];
        $v_msg   = [
            'nik.required'  => 'NIK tidak boleh kosong',
            'nik.unique'    => 'NIK tersebut sudah terdaftar',
            'nama.required' => 'Nama Dosen tidak boleh kosong',
        ];
        $req->validate($v_rules, $v_msg);
        
        $dosen->nik      = $req->nik;
        $dosen->nama     = $req->nama;
        $dosen->save();
        
        $user           = User::find($dosen->id_user);
        $user->level    = 2;
        $user->userid   = $req->userid;
        $user->password = Hash::make($req->password);
        $user->id_card  = $req->id_card;
        $user->pin      = substr($req->id_card, -4);
        $user->save();


        return redirect()->back()->with("msg_success", "Data Dosen Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::destroy($id);
        return redirect()->back()->with("msg_warning", "Data Dosen Berhasil Dihapus");
    }
}
