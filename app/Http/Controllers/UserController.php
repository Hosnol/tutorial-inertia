<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data user dari database
        $users = User::all();

        return Inertia::render('Index', [
            'users' => $users,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        //simpan data user ke database
        $post = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => bcrypt($request -> password),
        ]);

        //redirect ke halaman users
        if($post){
            return redirect() -> route('users.index') -> with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect() -> route('users.create') -> with('error', 'Data gagal ditambahkan');
        }
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
    public function edit(User $users)
    {
        return Inertia::render('Edit', [
            'user' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        //validasi data
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        //update data user ke database
        $users->update([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => bcrypt($request -> password),
        ]);

        //redirect ke halaman users
        if($users){
            return redirect() -> route('users.index') -> with('success', 'Data berhasil diubah');
        }else{
            return redirect() -> route('users.edit') -> with ('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mencari data user berdasarkan id
        $users = User::findOrfail($id);

        $users->delete();

        //redirect ke halaman users
        if($users){
            return redirect() -> route('users.index') -> with('success', 'Data berhasil dihapus');
        }else{
            return redirect() -> route('users.index') -> with ('error', 'Data gagal dihapus!!');
        }
    }
}
