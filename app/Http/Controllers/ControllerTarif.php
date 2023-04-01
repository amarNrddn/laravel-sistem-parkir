<?php

namespace App\Http\Controllers;

use App\Tarif;
use Illuminate\Http\Request;

class ControllerTarif extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Tarif::all();
        $no = 1;
        return view('layouts.data_tarif',['data'=>$data,'no'=>$no]);    
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
       $this->validate(request(),[
        'jenis_kendaraan' => 'required|string',
        'tarif' => 'required|max:4'
       ]);

       // If(Hash::check($request->password,Auth::user()->password)){
       //      $user = Auth::user();
       //      $user->password = bcrypt($request->password);
       //      $user->save();
       // }

       $tarif = Tarif::create([
        'tarif' => $request->tarif,
        'jenis_kendaraan' => $request->jenis_kendaraan
       ]);
       return redirect('/tarif/TarifParkir')->with('message','Tarif Baru Berhasil Di Input');
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
        $id = Tarif::find($id);

        return view('layouts.edit_tarif',['data' => $id]);
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
         $tarif = Tarif::find($id);

        $this->validate(request(),[
            'id' => 'required',
            'jenis_kendaraan' => 'required',
            'tarif' => 'required|max:7'
        ]);

        $data = [
            'id' => $request->id,
            'tarif' => $request->tarif,
            'jenis_kendaraan' => $request->jenis_kendaraan
        ];
         $tarif->update($data);
        return redirect('/tarif/TarifParkir')->with('message','Tarif Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Tarif::destroy($id);
        return redirect('/tarif/TarifParkir')->with('message','Tarif Berhasil Di Hapus');    
    }
}
