<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tambah_usulan;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('users.create');
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required|confirmed',
        'is_admin'=> 'required',
    ]);
    $array = $request->only([
        'name', 'username', 'email', 'password', 'is_admin', 'perangkat_daerah'
    ]);
    $array['password'] = bcrypt($array['password']);
    User::create($array);
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menambah user baru');
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
    $user = User::find($id);
    if (!$user) return redirect()->route('users.index')
        ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
    return view('users.edit', [
        'user' => $user
    ]);
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'sometimes|nullable|confirmed'
    ]);
    $user = User::find($id);
    $user->name = $request->name;
    $user->username = $request->username;
    $user->perangkat_Daerah = $request->perangkat_daerah;
    $user->email = $request->email;
    $user->is_admin = $request->is_admin;
    if ($request->password) $user->password = bcrypt($request->password);
    $user->save();
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil mengubah user');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
{
    $user = User::find($id);
    if ($id == $request->user()->id) return redirect()->route('users.index')
        ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
    if ($user) $user->delete();
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menghapus user');
}
    public function tambah_usulan()
    {
        return $this->hasMany(tambah_usulan::class);
    }
}
