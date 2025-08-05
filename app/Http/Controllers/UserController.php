<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    private function listRole()
    {
        return [
            'Admin',
            'Pengguna',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/user/index', [
            'judul' => 'Selamat Datang',
            'data_user' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/user/index', [
            'judul' => 'Tambah Daftar Akun',
            'user' => new User,
            'list_role' => $this->listRole(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        // $user->sendEmailVerificationNotification();
        return back()->with('berhasil', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages/user/index', [
            'judul' => 'Ubah Daftar Akun - ' . $user->nama_lengkap,
            'user' => $user,
            'list_role' => $this->listRole(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // if ($user->email != $request->email) {
        //     $user->email_verified_at = null;
        //     $user->save();
        //     $user->sendEmailVerificationNotification();
        // }
        User::where('id', $user->id)->update($request->except(['_method', '_token']));
        return back()->with('berhasil', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('berhasil', 'Data berhasil dihapus');
    }
}
