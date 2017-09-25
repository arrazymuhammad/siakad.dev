<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Model\Rf\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $data['matakuliah'] = MataKuliah::all();
        if($req->semester) $data['matakuliah'] = MataKuliah::where('semester', $req->semester)->get();
        return view('admin.master.matakuliah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // $this->dataMK();
        $data['semester'] = $req->semester;
        return view('admin.master.matakuliah.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $v_rules = [
                    'semester' => 'required',
                    'kode' => 'required|unique:rf_mata_kuliah', 
                    'nama' => 'required',
                    'sks' => 'required',
                    'jenis_mk' => 'required',
                    'jam_teori' => 'required_unless:jenis_mk,2|required_if:jenis_mk,3',
                    'jam_praktikum' => 'required_unless:jenis_mk,1|required_if:jenis_mk,3'
                ];
        $v_msg   = [
                    'kode.required' => 'Kode MK tidak boleh kosong',
                    'kode.unique' => 'Kode MK tersebut sudah terdaftar',
                    'nama.required'     => 'Nama Mata Kuliah tidak boleh kosong',
                    'sks.required'     => 'Jumlah SKS tidak boleh kosong',
                    'jam_teori.required_unless'     => 'Jam Teori tidak boleh kosong kecuali untuk Mata Kuliah Praktikum',
                    'jam_praktikum.required_unless'     => 'Jam Praktikum tidak boleh kosong kecuali untuk Mata Kuliah Teori',
                ];

        $req->validate($v_rules, $v_msg);

        $matakuliah = new MataKuliah();
        $matakuliah->semester = $req->semester;
        $matakuliah->kode = $req->kode;
        $matakuliah->nama = $req->nama;
        $matakuliah->sks = $req->sks;
        $matakuliah->jenis_mk = $req->jenis_mk;
        $matakuliah->jam_teori = $req->jam_teori;
        $matakuliah->jam_praktikum = $req->jam_praktikum;
        $matakuliah->save();

        return redirect()->back()->with("msg_success" , "Matakuliah Berhasil Ditambahkan");
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
        return view('admin.master.matakuliah.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['matakuliah'] = MataKuliah::find($id);
        return view('admin.master.matakuliah.edit',$data);
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
        $matakuliah = MataKuliah::find($id);

        $v_rules = [
                    'semester' => 'required',
                    'kode' => 'required|unique:rf_mata_kuliah,kode,'.$matakuliah->id, 
                    'nama' => 'required',
                    'sks' => 'required',
                    'jenis_mk' => 'required',
                    'jam_teori' => 'required_unless:jenis_mk,2|required_if:jenis_mk,3',
                    'jam_praktikum' => 'required_unless:jenis_mk,1|required_if:jenis_mk,3'
                ];
        $v_msg   = [
                    'kode.required' => 'Kode MK tidak boleh kosong',
                    'kode.unique' => 'Kode MK tersebut sudah terdaftar',
                    'nama.required'     => 'Nama Mata Kuliah tidak boleh kosong',
                    'sks.required'     => 'Jumlah SKS tidak boleh kosong',
                    'jam_teori.required_unless'     => 'Jam Teori tidak boleh kosong kecuali untuk Mata Kuliah Praktikum',
                    'jam_praktikum.required_unless'     => 'Jam Praktikum tidak boleh kosong kecuali untuk Mata Kuliah Teori',
                ];
        
        $req->validate($v_rules, $v_msg);
        
        $matakuliah = MataKuliah::find($id);
        $matakuliah->semester = $req->semester;
        $matakuliah->kode = $req->kode;
        $matakuliah->nama = $req->nama;
        $matakuliah->sks = $req->sks;
        $matakuliah->jenis_mk = $req->jenis_mk;
        $matakuliah->jam_teori = $req->jam_teori;
        $matakuliah->jam_praktikum = $req->jam_praktikum;
        $matakuliah->save();

        return redirect('admin/master/matakuliah')->with("msg_info" , "Data Mata Kuliah Berhasil Diubah");
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

    public function dataMK()
    {
        $mk = [
                [
                    ["TIK1205","Bahasa Inggris 1",2,2,""],
                    ["TIK1208","Matematika Teknik 1",2,3,""],
                    ["TIK1211","Pengantar Teknologi Informasi",2,3,""],
                    ["TIK1333","Konsep Basis Data",3,2,4],
                    ["TIK1234","Dasar Sistem Informasi",2,3,""],
                    ["TIK1328","Konsep Pemrograman",3,2,6],
                    ["TIK1329","Workshop Keterampilan Komputer",3,2,6],
                    ["TIK1203","Pancasila dan Kewarganegaraan",2,2,""],
                    ["TIK1204","Bahasa Indonesia",2,3,""]

                ],
                [
                    ["TIK2207","Bahasa Inggris 2",2,2,""],
                    ["TIK2209","Matematika Teknik 2",2,3,""],
                    ["TIK2210","Metode Numerik",2,1,2],
                    ["TIK2230","Sistem Operasi",2,3,""],
                    ["TIK2331","Desain dan Pemrograman Web",3,2,6],
                    ["TIK2332","Pemrograman Berorientasi Obyek",3,2,6],
                    ["TIK2201","Agama",2,2,""],
                    ["TIK2335","Basis Data",3,2,3],
                    ["TIK2236","Praktek Dasar Sistem Informasi",2,"",4]
                ],
                [
                    ["TIK3212","Bahasa Ingris Profesi",2,1,2],
                    ["TIK3213","Matematika Diskrit",2,3,""],
                    ["TIK3337","Konsep Jaringan",3,1,5],
                    ["TIK3238","Data Base Clien server",2,1,3],
                    ["TIK3249","Interaksi Manusia dan Komputer",2,2,""],
                    ["TIK3321","Rekayasa Perangkat Lunak",3,1,5],
                    ["TIK3220","Analisa Perancangan Sistem Informasi",2,3,""],
                    ["TIK3215","Organisasi dan Arsitektur Komputer",2,3,""],
                    ["TIK3339","Multimedia",3,"",8],
                ],
                [
                    ["TIK4214","Bahasa Ingris Informatika",2,1,2],
                    ["TIK4216","Manajemen Proyek Sistem Informasi",2,3,""],
                    ["TIK4206","Ilmu Sosial Budaya Dasar",2,3,""],
                    ["TIK4217","Sistem Pendukung Keputusan",2,3,""],
                    ["TIK4340","Keamanan Jaringan",3,"",6],
                    ["TIK4341","Proyek 1",3,"",8],
                    ["TIK4224","Kecerdasan Buatan",2,1,2],
                    ["TIK4342","Sistem Informasi Geografis",3,2,2],
                    ["TIK4243","Wirelees Comunication",2,"",5],
                ],
                [
                    ["TIK5326","Sistem Keamanan Data",3,1,4],
                    ["TIK5223","Pengolahan Citra",2,1,2],
                    ["TIK5244","Visual Basic",3,"",8],
                    ["TIK5345","Proyek 2",3,"",8],
                    ["TIK5218","Ilmu Alamiah Dasar",2,2,""],
                    ["TIK5225","Kewirausahaan",2,2,""],
                    ["TIK5222","Metodologi Penelitian",2,1,2],
                    ["TIK5246","Aplikasi dan Teknologi Web",2,"",4],
                    ["TIK5219","Keterampilan Komunikasi",2,1,2]
                ],
                [
                    ["TIK6648","Praktek Kerja Lapangan",6,"",20],
                    ["TIK6447","Tugas Akhir",4,"",16],
                    ["TIK6227","Etika Profesi",2,2,""]
                ]
            ];
        foreach ($mk as $key => $semester) {
            foreach ($semester as $matakuliah) {
                $mks = new Matakuliah;
                $mks->kode = $matakuliah[0];
                $mks->nama = $matakuliah[1];
                $mks->sks   = $matakuliah[2];
                $mks->semester = $key+1;
                $mks->jam_teori = ($matakuliah[3] !== "") ? $matakuliah[3] : 0;
                $mks->jam_praktikum = ($matakuliah[4] !== "") ? $matakuliah[4] : 0;
                if($mks->jam_teori !== 0 && $mks->jam_praktikum !== 0) {
                    $mks->jenis_mk = 3;
                } else if ($mks->jam_teori !== 0 && $mks->jam_praktikum == 0) {
                    $mks->jenis_mk = 1;
                } else {
                    $mks->jenis_mk = 2;
                }
                $mks->save();
            }
        }
    }
}
