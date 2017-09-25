<?php 



/**
 * 
 */
 class ClassName extends AnotherClass
 {
 	
 	public function dataMahasiswa()
    {
        $mahasiswa = [[["3042015001", "Susanti"],
            ["3042015002", "Devi Riani Nuradmi"],
            ["3042015003", "Satrio Akbar Kayung"],
            ["3042015004", "Ayu Prihatin"],
            ["3042015005", "Hidayat"],
            ["3042015007", "Winda Safitri"],
            ["3042015008", "Novi Nisa Atussalehah"],
            ["3042015009", "Ullan Pramasari"],
            ["3042015010", "Nanda Nugraha"],
            ["3042015011", "Nendya Putri Susanto"],
            ["3042015013", "Ahmad Hafidz"],
            ["3042015015", "Winda Martasari"],
            ["3042015016", "Muhammad Wahyudin"],
            ["3042015017", "Pebri Hariansyah"],
            ["3042015019", "M.Juni Rian Efendi"],
            ["3042015020", "Budi Santoso"],
            ["3042015021", "Utin Ana Zakiyatul Faudah"],
            ["3042015022", "Nada Kristina"],
            ["3042015023", "Suriani"],
            ["3042015025", "Muhardi"],
            ["3042015026", "Adriya Pratama"],
            ["3042015027", "Miftah Lana"],
            ["3042015028", "Ahmad Asuardi"],
            ["3042015029", "Ranimasari"]],
            [["3042015031", "Frengki Firdaus"],
            ["3042015032", "Agung Setiawan"],
            ["3042015033", "June Irma Dhinita"],
            ["3042015034", "Satria Agung Kurnia"],
            ["3042015035", "Novi Tri Astuti"],
            ["3042015036", "Yudha Sugara Pradhana"],
            ["3042015037", "Nurlaila"],
            ["3042015038", "Syarifa Yunida"],
            ["3042015039", "M. Abdul Aziz"],
            ["3042015042", "Dimas Gilang Gumelar"],
            ["3042015043", "Jumiarti"],
            ["3042015044", "Robi Tri Wardana"],
            ["3042015045", "Azi Dwi Wahyudi"],
            ["3042015047", "Wiwit"],
            ["3042015048", "Hadi Prianto"],
            ["3042015049", "Azmi Maulana"],
            ["3042015050", "Indah Pratiwi"],
            ["3042015051", "Desi Yunita"],
            ["3042015052", "Maria Fivanti Aso"],
            ["3042015053", "Jemi Saputra"],
            ["3042015054", "Waluyo Sejati"],
            ["3042015055", "Nufiah"],
            ["3042015056", "Ricky Pratama"],
            ["3042015058", "Aimi Rahayu"],
            ["3042015059", "Erma Melianty"]]];
        return $mahasiswa;
    }

    public function getCardRegister($id_card = null)
    {
        $data = [];
        $data['kelas'] = Kelas::all();
        if($id_card){
            $kelas = Kelas::where('id_card',$id_card)->first();
            $data['mahasiswa'] = Mahasiswa::where('id_kelas', $kelas->id)->get();
            $data['mahasiswa_belum'] = Mahasiswa::where('id_card', null)->skip(1)->take(5)->get();
            $data['mahasiswa_belum_set'] = Mahasiswa::where('id_card', null)->first();

        }
        return view('admin.master.mahasiswa.card-register', $data);
    }

    public function getCard($id)
    {
        $kelas = Kelas::where('id_card',$id)->first();
        if($kelas) {
            return $kelas->id_card;
        } else {
            return "";
        }
    }
    public function getResetCard()
    {
        foreach(Mahasiswa::all() as $mhs){
            $mhs->id_card = null;
            $mhs->save();
        }
        return redirect('master/mahasiswa');

    }    

    public function getByCard($id_card)
    {
        $mahasiswa = Mahasiswa::where('id_card', $id_card)->first();
        if($mahasiswa){
            return $mahasiswa->toJson();
        }else {
            return "false";
        }
    }

    public function setCard($nim, $id_card)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if($mahasiswa){
            if($mahasiswa->id_card and $mahasiswa->id_card != "skip"){
                return "Mahasiswa Sudah Mendapatkan Kartu";
            }else {
                $card = Mahasiswa::where('id_card', $id_card)->get();
                if(count($card) > 0 and $id_card != "skip"){
                    return "Ganti Kartu!!! Kartu Sudah Terdaftar.";
                }else{
                    $mahasiswa->id_card = $id_card;
                    $mahasiswa->save();
                    return "true";
                }
            }
        }else{
            return "Mahasiswa Ilegal !!!";
        }
    }

    public function updateCard($nim, $id_card)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if($mahasiswa){
            $card = Mahasiswa::where('id_card', $id_card)->get();
            if(count($card) > 0 and $id_card != "skip"){
                return "Ganti Kartu!!! Kartu Sudah Terdaftar.";
            }else{
                $mahasiswa->id_card = $id_card;
                $mahasiswa->save();
                return "true";
            }
        }else{
            return "Mahasiswa Ilegal !!!";
        }
    }
 } ?>