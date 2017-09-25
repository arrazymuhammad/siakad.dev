<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Model\Master\Kartu;
use App\Model\Ms\Mahasiswa;
use App\Model\Ms\User;
use App\Model\Rf\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $mahasiswa =  Mahasiswa::with('user')->get();
        if($req->angkatan) {
            $data['angkatan'] = $req->angkatan;
            $data['kelas'] = Kelas::where('angkatan', $req->angkatan)->get();
            $mahasiswa = Kelas::where('angkatan', $req->angkatan)->get()->pluck('mahasiswa')->flatten();
            if($req->id_kelas){
                $mahasiswa = Kelas::find($req->id_kelas)->mahasiswa;
            }
        }
        $data['mahasiswa'] = $mahasiswa;
        return view('admin.master.mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        
        $data['kelas']   = Kelas::find($req->id_kelas);
        $data['kelas_all']      = Kelas::all();
        return view('admin.master.mahasiswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $v_rules = ['nim' => 'required|unique:ms_mahasiswa', 'nama' => 'required'];
        $v_msg   = [
                    'nim.required' => 'NIM tidak boleh kosong',
                    'nim.unique' => 'NIM tersebut sudah terdaftar',
                    'nama.required'     => 'Nama Mahasiswa tidak boleh kosong',
                ];
        $req->validate($v_rules, $v_msg);
        $user = new User;
        $user->save();

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $req->nim;
        $mahasiswa->nama = $req->nama;
        $mahasiswa->id_user = $user->id;
        $mahasiswa->id_kelas = $req->id_kelas;
        $mahasiswa->save();

        return redirect()->back()->with("msg_success" , "Mahasiswa Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['mahasiswa'] = Mahasiswa::find($id);
        return view('admin.master.mahasiswa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kelas'] = Kelas::all();
        $data['mahasiswa'] = Mahasiswa::find($id);
        return view('admin.master.mahasiswa.edit',$data);
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
        $v_rules = ['nim' => 'required|unique:ms_mahasiswa,nim,'.$id,'nama' => 'required'];
        $v_msg   = [
                    'nim.required'  => 'NIM tidak boleh kosong',
                    'nim.unique'    => 'NIM tersebut sudah terdaftar',
                    'nama.required' => 'Nama Mahasiswa tidak boleh kosong',
                ];
        
        $req->validate($v_rules, $v_msg);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $req->nama;
        $mahasiswa->id_kelas = $req->id_kelas;
        $mahasiswa->save();

        return redirect('admin/master/mahasiswa')->with("msg_info" , "Data Mahasiswa Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect()->back()->with("msg_warning" , "Mahasiswa Berhasil Dihapus");
    }

}
