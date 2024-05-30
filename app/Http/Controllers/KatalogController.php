<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Katalog;
use Illuminate\Http\Request;
use App\Exports\KatalogExport;
use App\Imports\KatalogImport;
use Maatwebsite\Excel\Facades\Excel;

class KatalogController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Katalog::where('namaBarang','like', '%' . $request->search . '%')->paginate(5);
        }else{
            $data = Katalog::paginate(5);
        }
        // dd($data);
        return view('katalog', compact('data'));
    }

    public function addBarang(){
        return view('addBarang');
    }

    public function insertBarang(Request $request){
        // dd($request->all());
        $data= Katalog::create($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('fotoBarang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('katalog')->with('sukses', 'Data Berhasil Ditambahkan ke Katalog!');
    }

    public function tampilDataBarang($id){
        $data = Katalog::find($id);
        // dd($data);
        return view('tampilDataBarang', compact('data'));
    }

    public function updateDataBarang(Request $request, $id){
        $data = Katalog::find($id);
        $data->update($request->all());

        if($request->hasFile('foto')){
            // Hapus File Foto Lama
            if($data->foto && file_exists(public_path('fotoBarang/'.$data->foto))){
                unlink(public_path('fotoBarang/'.$data->foto));
            }

            // Upload File Foto Baru
            $request->file('foto')->move('fotoBarang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('katalog')->with('sukses', 'Data Berhasil Diperbarui!');
    }



    public function deleteDataBarang($id){
        $data = Katalog::find($id);
        $data->delete();

        return redirect()->route('katalog')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function exportPDF(){
        $data = Katalog::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('katalog-pdf');
        return $pdf->download('katalogBarang.pdf');
    }

    public function exportExcel(){
        return Excel::download(new KatalogExport, 'katalog.xlsx');
    }

    public function importExcel(Request $request){
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('fileDataExcel/', $namafile);

        Excel::import(new KatalogImport, \public_path('/fileDataExcel/'.$namafile));
        return \redirect()->back();
    }

    // public function updateDataBarang($id){
    //     $data = Katalog::find($id);
    //     $data = update($request->all());

    //     return redirect()->route('katalog')->with('sukses', 'Data Berhasil Diperbarui!');
    // }
}
