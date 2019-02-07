<?php

namespace App\Http\Controllers;

use DataTables;
use App\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{

    public function data_json()
    {
        return DataTables::of(Matakuliah::all())
        ->addColumn('action', function ($row) {

                  $action = '
                      <div class="text-center">
                      <button type="button" class="btn btn-md bg-olive bg-flat" id="edit_klik"
                      data-kode_mk="'.$row->kode_mk.'"
                      data-nama_mk="'.$row->nama_mk.'"
                      data-jml_sks="'.$row->jml_sks.'"
                      data-ket_mk="'.$row->ket_mk.'"
                      data-toggle="modal" data-target="#edit_mk" name="button"> <i class="fa fa-edit"></i></button> || ';

                  $action .= \Form::open(['url' => 'matakuliah/'.$row->kode_mk,'method' => 'delete',
                      'style' => 'display:inline',
                      'onsubmit' => 'return confirm("Hapus Data ?")']);
                  $action .= '<button type="submit" class="btn btn-md bg-maroon bg-flat" name="button"><i class="fa fa-trash"></i></button>';
                  $action .= \Form::close().'</div>';

                  return $action;
             })
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matakuliah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'kode_mk' => 'required|unique:matakuliah,kode_mk',
            'nama_mk' => 'required',
            'jml_sks' => 'required|numeric'
        ]);


        $save = new Matakuliah;
        $save->kode_mk = $request->input('kode_mk');
        $save->nama_mk = $request->input('nama_mk');
        $save->jml_sks = $request->input('jml_sks');
        $save->ket_mk  = $request->input('ket_mk');
        $save->save();

        return redirect()->route('matakuliah.index')->with('matakuliahCreate', 'Berhasil menambahkan matakuliah');

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

      $except = Matakuliah::FindOrFail($request->kode_mk);
      $validator = $this->validate($request, [
          'kode_mk' => 'required|unique:matakuliah,kode_mk,'.$except->kode_mk.',kode_mk',
          'nama_mk' => 'required',
          'jml_sks' => 'required|numeric'
      ]);

        $update = Matakuliah::FindOrFail($request->kode_mk);
        $update->nama_mk = $request->input('nama_mk');
        $update->jml_sks = $request->input('jml_sks');
        $update->ket_mk  = $request->input('ket_mk');
        $update->save();

        return redirect()->route('matakuliah.index')->with('matakuliahUpdate', 'Berhasil update matakuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Matakuliah::FindorFail($id);
        $hapus->delete();
        return redirect()->route('matakuliah.index')->with('matakuliaDelete', 'Hapus data matakuliah berhasil');
    }
}
