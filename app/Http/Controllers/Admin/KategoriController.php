<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\kategori; 
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Kategori';
        $data=kategori::all();
        return view('admin.kategori.index',compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori=kategori::all();
        $pagename='Form Input Kategori';
        return view('admin.kategori.create',compact('pagename','data_kategori'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'txtnama'=>'required',
        'txtstatus'=>'required',
       ]);

       $data_tugas=new kategori([
           'nama_kategori'=> $request->get('txtnama'),
           'status_kategori'=> $request->get('txtstatus'),
       ]);
       $data_tugas->save();
       return redirect('admin/kategori')->with('succes','data berhasil disimpan');
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
        $data_kategori=kategori::all();
        $pagename='Update kategori';
        $data=kategori::find($id);
        return view ('admin.kategori.edit', compact('data','pagename','data_kategori'));
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
        $request->validate([
            'txtnama'=>'required',
            'txtstatus'=>'required',
           ]);
    
          $tugas=kategori::find($id);
              $tugas->nama_kategori = $request->get('txtnama');
              $tugas->status_kategori= $request->get('txtstatus');
          
           $tugas->save();
           return redirect('admin/kategori')->with('succes','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas=kategori::find($id);
        $tugas->delete();
        return redirect('admin/kategori')->with('succes','data berhasil dihapus');
    }
}
