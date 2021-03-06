<?php

namespace App\Http\Controllers;

use DataTables;
use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function data_json()
    {
      return DataTables::of(Dosen::all())
                        ->addColumn('foto', function ($row) {
                            $url = asset('storage/'.$row->foto);
                            $img = '<img src="'.$url.'" alr="" width="70px">';
                            return $img;
                        })
                        ->addColumn('action', function ($row) {
                                  $urlEdit = route('dosen.edit', $row->nik_nip);
                                  $action = '
                                      <div class="text-center">
                                      <a href="'.$urlEdit.'" class="btn btn-md bg-olive bg-flat"> <i class="fa fa-edit"></i> </a> || ';

                                  $action .= \Form::open(['url' => 'dosen/'.$row->nik_nip,'method' => 'delete',
                                      'style' => 'display:inline',
                                      'onsubmit' => 'return confirm("Hapus Data ?")']);
                                  $action .= '<button type="submit" class="btn btn-md bg-maroon bg-flat" name="button"><i class="fa fa-trash"></i></button>';
                                  $action .= \Form::close().'</div>';

                                  return $action;
                             })
                        ->rawColumns(['foto', 'action'])
                        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik_nip' => 'required|unique:dosen,nik_nip',
            'nama'    => 'required',
            'email'   => 'required|unique:dosen,email',
            'no_hp'   => 'required',
            'foto'    => 'required'
        ]);

        $dosen = new Dosen;
        $dosen->nik_nip = $request->input('nik_nip');
        $dosen->nama    = $request->input('nama');
        $dosen->email   = $request->input('email');
        $dosen->no_hp   = $request->input('no_hp');

        $file = $request->file('foto')->store('foto_dosen', 'public');
        $dosen->foto = $file;
        $dosen->save();

        return redirect()->route('dosen.index')->with('dosenCreate', 'Berhasil menambahkan data dosen');
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
        $data = Dosen::FindOrFail($id);
        return view('dosen.edit', compact('data'));
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
          $except = Dosen::FindOrFail($id);

          $this->validate($request, [
              'nik_nip' => 'required|unique:dosen,nik_nip,'.$id.',nik_nip',
              'nama'    => 'required',
              'email'   => 'required|unique:dosen,email,'.$except->email.',email',
              'no_hp'   => 'required',
              'foto'    => 'sometimes'
          ]);

          $dosen = Dosen::FindOrFail($id);

          if ($dosen->nik_nip != $request->nik_nip) {
              abort(404);
              die;
          }

          if ($request->foto) {
              if (file_exists(storage_path('app/public/'.$dosen->foto))) {
                  \Storage::delete('public/'.$dosen->foto);
                  $file = $request->file('foto')->store('foto_dosen', 'public');
                  $dosen->foto = $file;
              }else {
                $file = $request->file('foto')->store('foto_dosen', 'public');
                $dosen->foto = $file;
              }
          }

          $dosen->nik_nip = $request->input('nik_nip');
          $dosen->nama    = $request->input('nama');
          $dosen->email   = $request->input('email');
          $dosen->no_hp   = $request->input('no_hp');
          $dosen->save();

          return redirect()->route('dosen.index')->with('dosenUpdate', 'Berhasil update data Dosen');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::FindOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('dosenDelete', 'Hapus data dosen berhasil');
    }

    public function trash()
    {
        return view('dosen.trash');
    }

    public function trash_json()
    {
      return DataTables::of(Dosen::onlyTrashed()->get())
                        ->addColumn('foto', function ($row) {
                            $url = asset('storage/'.$row->foto);
                            $img = '<img src="'.$url.'" alr="" width="70px">';
                            return $img;
                        })
                        ->addColumn('action', function ($row) {
                                  $url_restore = route('dosen_trash.restore', $row->nik_nip);
                                  $action = '
                                      <div class="text-center">
                                      <a href="'.$url_restore.'" class="btn btn-md bg-olive bg-flat"> <i class="fa fa-window-restore"></i> </a> || ';

                                  $action .= \Form::open(['route' => ['dosen.delete', $row->nik_nip],
                                      'method' => 'delete',
                                      'style' => 'display:inline',
                                      'onsubmit' => 'return confirm("Hapus Data permanen ?")']);
                                  $action .= '<button type="submit" class="btn btn-md bg-maroon bg-flat" name="button"><i class="fa fa-trash"></i></button>';
                                  $action .= \Form::close().'</div>';

                                  return $action;
                             })
                        ->rawColumns(['foto', 'action'])
                        ->make(true);
    }

    public function restore($id)
    {
        $data = Dosen::withTrashed()->FindorFail($id);
          if ($data) {
              $data->restore();
          }

          return redirect()->route('dosen.index')->with('dosenRestore', 'Restore data dosen berhasil');
    }

    public function delete_permanent($id)
    {
        $data = Dosen::withTrashed()->FindOrFail($id);
          if ($data) {
              $data->forceDelete();
              \Storage::delete('public/'.$data->foto);
          }

          return redirect()->route('dosen.trash')->with('dosenPermanent', 'Hapus permanen data dosen berhasil');
    }
}
