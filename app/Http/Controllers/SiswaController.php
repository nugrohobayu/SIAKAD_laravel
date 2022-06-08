<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use Validator;
use App\telepon;
use App\kelas;
use App\hobi;

class SiswaController extends Controller
{
    public function index(){
       $siswa_list = siswa::orderBy('nama_siswa', 'asc' )->paginate(5);
       $jumlah_siswa = siswa::count();
       return view ('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    public function create(){
        $list_kelas = kelas::pluck('nama_kelas', 'id');
        $list_hobi = hobi::pluck('nama_hobi', 'id');
        return view('siswa.create', compact('list_kelas', 'list_hobi'));
    }

    protected $request;

    public function _construct(Request $req){
        $this->request = $req;
    }

    public function store( Request $request){


        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn'              => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa'        => 'required|string|max:30',
            'tgl_lahir'         => 'required|date',
            'nomor_telepon'     => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
            'jenis_kelamin'     => 'required|in:L,P',
            'id_kelas'          => 'required',
        ]);

        if($validator->fails()){
            return redirect('siswa/create')
            ->withInput()
            ->withErrors($validator);
        }
        $siswa = siswa::create($input);

        $telepon = new telepon;
        $telepon->nomor_telepon= $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->attach($request->input('hobi_siswa'));

        return redirect('siswa');
       
    }

    public function show($id){
        $siswa = siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id){
        $siswa = siswa::findOrFail($id);
        
        if (!empty($siswa->telepon->nomor_telepon)){
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }
        $list_kelas = kelas::pluck('nama_kelas', 'id');
        $list_hobi = hobi::pluck('nama_hobi', 'id');

        
        return view('siswa.edit', compact('siswa', 'list_kelas', 'list_hobi'));
    }

    public function update($id, Request $request){
        $siswa =siswa::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn'              => 'required|string|size:4|unique:siswa,nisn,' .$request->input('id'),
            'nama_siswa'        => 'required|string|max:30',
            'tgl_lahir'         => 'required|date',
            'nomor_telepon'     => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,' . $request->input('id') . ',id_siswa',
            'jenis_kelamin'     => 'required|in:L,P',
            'id_kelas'          => 'required',
        ]);

        if($validator->fails()){
            return redirect('siswa/' .$id. '/edit')
            ->withInput()
            ->withErrors($validator);
        }
        $siswa->update($request->all());

        // $telepon = $siswa->telepon;
        // $telepon->nomor_telepon = $request->input('nomor_telepon');
        //$siswa->telepon()->save($telepon);
        $siswa->hobi()->sync($request->input('hobi_siswa'));

        // Update nomor telepon, jika sebelumnya sudah ada no telp.
        if ($siswa->telepon){
            //jika telp. diisi update.
            if ($request->filled('nomor_telpon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);

            
            }
            // JIka telp. tidak diisi, hapus.
            else{
                $siswa->telepon()->delete();
            }
        }

        // Buat entry baru, jika sebelumnya tidak ada nomor telepon

        else{
            if($request->filled('nomor_telepon')){
                $telepon = new telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }


        return redirect('siswa');
    }

    public function destroy($id){
        $siswa = siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }

    public function dateMutator(){
        $siswa = siswa::findOrFail(1);
        $nama = $siswa->nama_siswa;
        $tanggal_lahir = $siswa->tgl_lahir->format('d-m-y');
        $ulang_tahun = $siswa->tgl_lahir->addYears(30)->format('d-m-y');
        return "Siswa {$nama} lahir pada {$tanggal_lahir} .<br> Ulang Tahun ke-30 akan jatuh pada {$ulang_tahun} .";
        // dd($siswa->created_at);
    }
}
