<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class DaftarController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = Student::count();
        if($number > 0)
        {
            $number = Student::max('no_daftar');
            $strnum = substr($number, 3, 4);
            $strnum = $strnum + 1;
            if(strlen($strnum) == 4)
            {
                $kode = 'REG' . $strnum;
            }else if (strlen($strnum) == 3) {
                $kode = 'REG' . "0" . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'REG' . "00" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'REG' . "000" . $strnum;
            }
        } else {
            $kode = 'REG' . "0001";
        }
        return view('siswa.daftar.index', [
            'kode' => $kode,
            'student' => Student::where('user_id', auth()->user()->id)->first()
        ]);
    }

    public function pdf_siswa()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
    	$pdf = PDF::loadview('siswa.pdf', ['student' => $student]);
    	return $pdf->stream();
    }

    public function pendaftar()
    {
        return view('siswa.index', [
            'student' => Student::where('user_id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attr = $this->studentRequest();
        auth()->user()->student()->create($attr);
        Alert::success('Informasi Pesan', 'Selamat, Anda sudah terdaftar di SMK Semangat 45');
        return back();
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
        return view('siswa.edit', [
            'student' => Student::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $student = Student::findOrFail($id);
        $student->update(request()->all());
        Alert::success('Informasi Pesan', 'Data berhasil diubah!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        Alert::success('Informasi Pesan', 'Data sudah dihapus');
        return back();
    }

    public function studentRequest()
    {
        return $this->validate(request(), [
            'no_daftar' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'asal_smp' => 'required',
            'jurusan' => 'required'
        ]);
    }
}
