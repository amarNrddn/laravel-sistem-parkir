<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;

class ControllerPegawai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        // $data = DB::table('users')->where('level','=','User')->paginate(10);
        $data = DB::table('users')->where('level','User')->get();
        $no = 1;
        return view('layouts.data_pegawai',['data'=>$data,'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'no_telp' => 'required|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'level' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $pegawai = User::create([
            'nama_user' => $data->name,
            'no_telp' => $data->no_telp,
            'email' => $data->email,
            'level' => $data->level,
            'password' => bcrypt($data['password']),
        ]);
        return back()->with('message','Pegawai Berhasil Di Tambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
       $data = User::find($id);

        return view('layouts.edit_pegawai',['data'=>$data]);
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
       $pegawai = User::find($id);

       if ($pegawai->email == $request->email) {
         $this->validate(request(),[
        'name' => 'required|string',
        'no_telp' => 'required|max:12',
        'email' => 'required|string|email',
        'level' => 'required|string'
       ]);
       }else{
         $this->validate(request(),[
        'name' => 'required|string',
        'no_telp' => 'required|max:12',
        'email' => 'required|string|email|unique:users',
        'level' => 'required|string'
       ]);
       }
     

       $data = [
        'nama_user' => $request->name,
        'no_telp' => $request->no_telp,
        'email' => $request->email,
        'level' => "User",
       ];

       $pegawai->update($data);

       return redirect('/pegawai/DataPegawai')->with('message','Data Pegawai Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::destroy($id);
        return back()->with('message','Data Pegawai Berhasil Di Hapus');
    }
}
