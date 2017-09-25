<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Model\Rf\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tahun_ajar'] = TahunAjar::all();
        return view('admin.master.tahun_ajar.index', $data);
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
        if($req->status == 1) {
            $tahun_ajar_lama = TahunAjar::where('status', 1)->get();
            foreach ($tahun_ajar_lama as $key => $item) {
                $item->status = 0;
                $item->save();
            }
        }
        if($req->method == 2){
            $tahun_ajar = TahunAjar::find($req->id_tahun_ajar);
            $tahun_ajar->tahun    = $req->tahun;
            $tahun_ajar->semester = $req->semester;
            $tahun_ajar->status = $req->status;
            $tahun_ajar->save();
            return redirect()->back()->with("msg_success", "Data Tahun Ajar Berhasil Diubah");
        } else {
            $tahun_ajar = TahunAjar::where('tahun', $req->tahun)
                ->where('semester', $req->semester)
                ->get();
            if ($tahun_ajar->count() == 0) {
                $tahun_ajar           = new TahunAjar;
                $tahun_ajar->tahun    = $req->tahun;
                $tahun_ajar->semester = $req->semester;
                $tahun_ajar->status = $req->status;
                $tahun_ajar->save();
                return redirect()->back()->with("msg_success", "Tahun Ajar Berhasil Ditambahkan");
            } else{
                return redirect()->back()->with("msg_error", "Tahun Ajar Tersebut Telah Terdaftar");
            }
        }
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
