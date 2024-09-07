<?php

namespace App\Http\Controllers\Api\Raport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function indexWeb() {
        return view('raport.siswa');
    }

    public function create(Request $request){
        $validatedReq = $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255|min:3',
            'kelas' => 'required|alpha',
            'nik' => 'required|unique:r_siswa,nama',
            'tempat_lahir' => 'required',
            'tanggal_larir' => 'required|date_format:d-m-Y'
        ]);
        // save to table r_siswa
        // redirect to page siswa
        return redirect()->route('page.siswa');

    }
    public function getListSiswa(){
        // get all data from table r_siswa where user_id 

        return 'allsiswa data';
    }

    public function getSiswa(){
        return 'return siswa with spesific id in userid';
    }
}
