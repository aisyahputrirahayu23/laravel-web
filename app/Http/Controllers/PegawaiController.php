<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class PegawaiController extends Controller
{
    public function index()
    {
        $name = "Aisyah Putri";
        $tanggal_lahir = "2006-02-23";
        $tanggal_harus_wisuda = "2028-10-28";
        $current_semester = "3";
        $hobbies = ["Membaca", "Menulis", "Bersepeda", "Listening Music", "Watching Movies"];
        $future_goal = "Menjadi Dosen";

        $lahir = new DateTime($tanggal_lahir);
        $hari_ini = new DateTime();
        $my_age = $hari_ini->diff($lahir)->y;

        $wisuda = new DateTime($tanggal_harus_wisuda);
        $time_to_study_left = $hari_ini->diff($wisuda)->days;

        if ($current_semester < 3) {
            $info = "Masih Awal, Kejar TAK.";
        } else {
            $info = "Jangan main-main, kurang-kurangi main game!";
        }

        $data = [
            'name' => $name,
            'my_age' => $my_age,
            'hobbies' => $hobbies,
            'tanggal_harus_wisuda' => $tanggal_harus_wisuda,
            'time_to_study_left' => $time_to_study_left. " hari",
            'current_semester' => $current_semester,
            'future_goal' => $future_goal,
            'motivasi' => $info
        ];
        return view('pegawai', $data);
    }
}
