<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Ms\Dosen;
use App\Model\Ms\Mahasiswa;
use App\Model\Ms\User;
use Hash;
use Illuminate\Http\Request;

class DummyMaster extends Controller
{
 
    public function create()
    {
        
    }

    public function createUser()
    {
        \DB::transaction(function (){
        $user = new User;
        $user->userid = "administrator";
        $user->id_card = "0000476878";
        $user->password = Hash::make("administrator");
        $user->pin  = "476878";
        $user->level = 5;
        $user->save();
        
        $user = new User;
        $user->userid = "admin";
        $user->password = Hash::make("admin");
        $user->level = 4;
        $user->save();
        
        $dosen =[
                    ["Aprianda Ibrahim, S.Kom", "161180715158"],
                    ["Ar-Razy Muhammad, S.T",   "161180916230"],
                    ["Desy Putri Syafrianti, S.Kom",    "161180915167"],
                    ["Eka Wahyudi, S.Pd, M.Cs", "161180116180"],
                    ["Indra Pratiwi, M.Pd", "161180915165"],
                    ["Novi Indah Pradasari, M.Kom", "161180716212"],
                    ["Pusparini Akhmad, S.Si",  "161180915166"],
                    ["Yudi Chandra, S.ST, M.T", "161180108073"],
                    ["Yusuf, S.ST, M.T",    "161180108068"]
                ];
        
        foreach ($dosen as $item) {
                $user = new User;
                $user->level = 2;
                $user->save();

                $dosen = new Dosen;
                $dosen->id_user = $user->id;
                $dosen->nama = $item[0];
                $dosen->nik = $item[1];
                $dosen->save();
            }

        $this->createMahasiswa();
        });
        
    }

    public function createMahasiswa()
    {
        $mahasiswa = [
            [
                ["3042015001", "Susanti"],
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
                ["3042015029", "Ranimasari"]
            ],
            [
                ["3042015031", "Frengki Firdaus"],
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
                ["3042015059", "Erma Melianty"]
            ],
            [
                ["3042016060","Yosi Erlianti"],
                ["3042016061","Akbar Satadi"],
                ["3042016062","Eja Fitriani Maledang"],
                ["3042016063","Adi Juanda"],
                ["3042016064","Syarif Mahdi"],
                ["3042016065","Azis Pranata"],
                ["3042016066","Pratiwi Fitrian"],
                ["3042016067","Anita Maulida"],
                ["3042016068","Wenti Maharani"],
                ["3042016069","Oktavianus Ropa Co'o"],
                ["3042016070","Nurwati"],
                ["3042016071","Nia Elpiana"],
                ["3042016072","Mery Yanti"],
                ["3042016073","Kiki Rizky Ananda"],
                ["3042016074","Ayuni Anisa"],
                ["3042016075","Siti Hatitin Suma Sari"],
                ["3042016077","Afridayani"],
                ["3042016078","Rizki Lia Noviyanti"],
                ["3042016079","Destri Wulandari"],
                ["3042016080","M. Taufiqurrahman"],
                ["3042016081","Fatimah"],
                ["3042016082","Sumarni"],
                ["3042016083","Yeni"],
                ["3042016084","Wahyu Dwi Putra"],
                ["3042016085","Yoga Dwigisma Arachman"],
                ["3042016086","Nada Perlina"],
                ["3042016087","Fitrian Febrianto"],
                ["3042016088","Apri Yuningsih"],
                ["3042016089","Fanti Afriana"],
                ["3042016090","Yunita"],
                ["3042016092","Diana Fenanda"]
            ],
            [
                ["3042016093","Jane Yolanda"],
                ["3042016094","Rahmita Wati"],
                ["3042016095","Junaidi"],
                ["3042016096","Tanti Purwanti"],
                ["3042016097","Siska Sulistia"],
                ["3042016098","Cici Trianingsih"],
                ["3042016099","Cici Fitriani"],
                ["3042016100","Erika Eriawati"],
                ["3042016101","Irsan Aulia Rahmatullah"],
                ["3042016102","Ety Suharni"],
                ["3042016103","Venita Utami"],
                ["3042016104","Desi Ratnasari"],
                ["3042016105","Karlina"],
                ["3042016106","Uti Fahry Suhendra"],
                ["3042016107","Diasti Fajariah"],
                ["3042016108","Ayup Herwansyah"],
                ["3042016109","Fitriyani"],
                ["3042016110","Ayu Azhari"],
                ["3042016111","Herry Mandala Putra"],
                ["3042016112","Nova Tania Maharani"],
                ["3042016113","Rika Safitri"],
                ["3042016114","Ayuni Dita Lestari"],
                ["3042016115","Jubaidah"],
                ["3042016116","Dean Nurlistiwa"],
                ["3042016117","Ardi Sudiyanto"],
                ["3042016118","Jodhi Patria"],
                ["3042016119","E'ed Ezar"],
                ["3042016120","Yatiyah"],
                ["3042016121","Dewi Putri Widodo"],
                ["3042016122","Rita Wahyuni"],
                ["3042016123","Zufinatul Ummah"],
                ["3042016124","Yesi Anggriani"],
                ["3042016125","Helian"]
            ],
            [
                ["3042016126","Umi Fakhrina"],
                ["3042016127","Rini Andriani"],
                ["3042016128","Doddy Julianto"],
                ["3042016129","Ritma Oktaviani"],
                ["3042016130","Joko Harianto"],
                ["3042016131","Winda Lestari Putri"],
                ["3042016132","Suryadi"],
                ["3042016133","Benedikta Mariska Devin"],
                ["3042016134","Egi Veronica"],
                ["3042016135","Della Sagita"],
                ["3042016136","Muhammad Riza Lutfi"],
                ["3042016137","Hamalia"],
                ["3042016138","Dita Nurliani"],
                ["3042016139","Andri Arahman Awit"],
                ["3042016140","Wahyu Aprianto"],
                ["3042016141","Aditya Prayogi"],
                ["3042016142","Muhammad Rozhi"],
                ["3042016143","Rani Mutiara Dewi"],
                ["3042016144","Teguh Eko Saputra"],
                ["3042016145","Aris Jumandar"],
                ["3042016146","Heti Andriyani"],
                ["3042016147","Nur Apriyanti"],
                ["3042016148","Mila Oktaviani"],
                ["3042016149","Fransiska Alpionita"],
                ["3042016150","Rahmi Dwi Fitria"],
                ["3042016151","Dicky Reynaldi"],
                ["3042016152","Rekki Swardi"],
                ["3042016155","Rika Kurniawati"],
                ["3042016156","Vianita Yolanda"],
                ["3042016157","Retno Aulyea Alzupa"],
                ["3042016158","Ahmad Kemal"]
            ],
            [
                ["3042017159",  "Ihsa Komara"],
                ["3042017160",  "Aldy Erwanda"],
                ["3042017161",  "Chika Kintami"],
                ["3042017162",  "Khorina"],
                ["3042017163",  "Vika Mildayani"],
                ["3042017164",  "Weldhan Seftian Hasfa"],
                ["3042017165",  "Uti Muhammad Ar-Razy"],
                ["3042017166",  "Yuni Herawati"],
                ["3042017167",  "Dandi Lasmana"],
                ["3042017168",  "Indah Purwanti"],
                ["3042017169",  "Sari Putem"],
                ["3042017170",  "Liza Eli Yanti"],
                ["3042017171",  "Laras Wati"],
                ["3042017172",  "Olivia"],
                ["3042017173",  "Muhammad Suhartono"],
                ["3042017174",  "Hendri"],
                ["3042017175",  "Muhammad Nardi"],
                ["3042017176",  "Dian Lestari"],
                ["3042017177",  "Rexsy Aditya Syahab"],
                ["3042017178",  "Yuniarti"],
                ["3042017179",  "Retno Wulan Lestari"],
                ["3042017180",  "Rizky Kurniawan"],
                ["3042017181",  "Desi Andina"],
                ["3042017182",  "Wedha Saputra"],
                ["3042017183",  "Henky Ilham"],
                ["3042017184",  "Ega Safitri"],
                ["3042017185",  "Rudi Hartono"],
                ["3042017186",  "Shintia Ardiyani"],
                ["3042017187",  "Utin Neda Askia"]
            ],
            [
                ["3042017188",  "Yuni Andriani"],
                ["3042017189",  "Elva Riza Butar - Butar"],
                ["3042017190",  "Nurjumadianti"],
                ["3042017191",  "Annisa Melyana Andhiani"],
                ["3042017192",  "Rika Amalia Putri"],
                ["3042017193",  "Rizki Prahmana Syaputra Riadi"],
                ["3042017194",  "Muhammad Haris Saputra"],
                ["3042017195",  "Kartika"],
                ["3042017196",  "Muhammad Gieofanny"],
                ["3042017197",  "Dina Indrastuti"],
                ["3042017198",  "Sonia Permata Sari"],
                ["3042017199",  "Rizca Yulitha"],
                ["3042017200",  "Wanda Sari"],
                ["3042017201",  "Losia Tating"],
                ["3042017202",  "Jubaidah"],
                ["3042017203",  "Aditya Budiman"],
                ["3042017204",  "Risky Firmansyah"],
                ["3042017205",  "Muhammad Hafiz"],
                ["3042017206",  "Heni Indrianti"],
                ["3042017207",  "Mila Yusa"],
                ["3042017208",  "Deviana"],
                ["3042017209",  "Dewi Ratna Sari"],
                ["3042017210",  "Rezky Amanda Prima"],
                ["3042017211",  "Winda"],
                ["3042017212",  "Weny Nalurita"],
                ["3042017213",  "Ariska Sriningsih"],
                ["3042017214",  "Egi Rusmanto"],
                ["3042017215",  "Yoga Putra Wiratama"],
                ["3042017216",  "Purnama Sari"],
                ["3042017217",  "Novi Vindawita"]
            ],
            [
                ["3042017218",  "Arda Ravisavitra Bayu"],
                ["3042017219",  "Muhammad Rizki Ariahi"],
                ["3042017220",  "Roni"],
                ["3042017221",  "Romi Bia Santo"],
                ["3042017222",  "Uti Andri Alpiandi"],
                ["3042017223",  "Resghi Rivaldi"],
                ["3042017224",  "Ahmad Sukirman"],
                ["3042017225",  "Rio Irwanto"],
                ["3042017226",  "Nurul Jannah"],
                ["3042017227",  "Fitriani"],
                ["3042017228",  "Aqli Roshadi"],
                ["3042017229",  "Uti Harry Purnama"],
                ["3042017230",  "M.Farhan Vicky Renaldo"],
                ["3042017231",  "Preliantika Bela"],
                ["3042017232",  "Padia Mawarni"],
                ["3042017233",  "Zulfiqar Syafutra"],
                ["3042017234",  "Suli Lestari"],
                ["3042017235",  "Fatimah Azzahra"],
                ["3042017236",  "Eva Susanti"],
                ["3042017237",  "Romi Andrie Kurniawan"],
                ["3042017238",  "Tias Mucus"],
                ["3042017239",  "Aditya Dwi Saputra"],
                ["3042017240",  "Iratul Nadiah"],
                ["3042017241",  "Livia Ramadani"],
                ["3042017242",  "Krisdianto Sudrajad"],
                ["3042017243",  "Erin Artika"],
                ["3042017244",  "Yolanda Puspita Sari"],
                ["3042017245",  "Muhammad Akbar"],
                ["3042017246",  "Zidni Irfan"],
                ["3042017247",  "Yustina Yuwiki Wiwit"]
            ]
        ];
    
        foreach ($mahasiswa as $kelas => $value) {
            foreach ($value as $item) {
                $user = new User;
                $user->level = 1;
                $user->save();
                $mhs = new Mahasiswa;
                $mhs->id_user = $user->id;
                $mhs->nama = $item[1];
                $mhs->nim = $item[0];
                $mhs->id_kelas = $kelas+1;
                $mhs->save();
            }
        }
    }

}
