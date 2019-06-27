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
                            <a href="'.route('matakuliah.edit', $row->kode_mk).'" class="btn btn-md bg-olive bg-flat" id="edit_klik"
                            name="button"> <i class="fa fa-edit"></i></a> || ';

                  $action .= \Form::open(['url' => 'matakuliah/'.$row->kode_mk,'method' => 'delete',
                            'style' => 'display:inline',
                            'onsubmit' => 'return confirm("Hapus Data ?")']);

                  $action .= '
                              <button type="submit" class="btn btn-md bg-maroon bg-flat" name="button"><i class="fa fa-trash"></i></button>';

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
        $data = Matakuliah::FindorFail($id);
        return view('matakuliah.edit', compact('data'));
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

        if ($except->kode_mk != $request->kode_mk) {
            abort(404);
            die;
        }

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

        return redirect()->route('matakuliah.index')->with('matakuliahUpdate', 'Update data matakuliah berhasil');
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

    public function trash()
    {
      return view('matakuliah.trash');
    }

    public function trash_json()
    {
      return DataTables::of(Matakuliah::onlyTrashed()->get())
                            ->addColumn('action', function ($row) {
                                      $url_restore = route('matakuliah_trash.restore', $row->kode_mk);
                                      $action = '
                                          <div class="text-center">
                                          <a href="'.$url_restore.'"class="btn btn-md bg-olive bg-flat"> <i class="fa fa-window-restore"></i> </a> || ';

                                      $url_trash_permanent = "/matakuliah/'.$row->kode_mk.'/delete";
                                      $action .= \Form::open(['route' => ['matakuliah.delete', $row->kode_mk],
                                          'method' => 'delete',
                                          'style' => 'display:inline',
                                          'onsubmit' => 'return confirm("Hapus Data permanen ?")']);
                                      $action .= '<button type="submit" class="btn btn-md bg-maroon bg-flat" name="button"><i class="fa fa-trash"></i></button>';
                                      $action .= \Form::close().'</div>';

                                      return $action;
                                 })
                            ->make(true);
    }

    public function restore($id)
    {
        $data = Matakuliah::withTrashed()->FindOrFail($id);
          if ($data) {
              $data->restore();
          }

          return redirect()->route('matakuliah.index')->with('matakuliahRestore', 'Restore data matakuliah berhasil');


    }

    public function delete_permanent($id)
    {
        $data = Matakuliah::withTrashed()->FindOrFail($id);
          if ($data->trashed()) {
                $data->forceDelete();
          }

          return redirect()->route('matakuliah.trash')->with('matakuliahPermanent', 'Hapus permanen matakuliah berhasil');
    }
}
