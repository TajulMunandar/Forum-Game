<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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
        $kategoris = Kategori::all();
        return view('dashboard.kategori.index', [
            'title' => 'KATEGORI'
        ])->with(compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:255',
            'kode_kategori' => 'required|max:255',
        ]);

        Kategori::create($validatedData);
        return redirect('/dashboard/game/list-kategori')->with('success', 'Kategori baru berhasil dibuat!');
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
    public function update(Request $request)
    {
        $rules = [
            'kategori' => 'required|max:255',
            'kode_kategori' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        Kategori::where('id', $request->id)->update($validatedData);

        return redirect('/dashboard/game/list-kategori')->with('success', "Kategori $request->kategori berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Kategori::find($id);
        $id->delete();

        // Kategori::destroy($kategori->id);
        return redirect('/dashboard/game/list-kategori')->with('success', "Kategori $id->kategori berhasil dihapus!");
    }
}
