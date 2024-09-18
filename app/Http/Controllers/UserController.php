<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Jobsheet 3
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4,
        // ];
        // UserModel::insert( $data ); // tambahkan data ke tabel m_user

        // tambah data user dengan Eloquent Model
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); // update data user

        // // Coba askses model UserModel
        // $user = UserModel::all(); // ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // Jobsheet 4
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // Praktikum 2.3
        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user);
        // return view('user', ['data' => $user]);

        // Praktikum 2.4
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga TIga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);

        // Praktikum 2.5
        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user->username = 'manager56';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //false
        // $user->isDirty('nama'); // true
        // $user->isDirty(['nama', 'username']); // false

        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        // $user->save();

        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());

        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged();
        // $user->wasChanged('username');
        // $user->wasChanged(['username', 'level_id']);
        // $user->wasChanged('nama');
        // dd($user->wasChanged(['nama', 'username']));

        // Praktikum 2.6
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // Praktikum 2.7
        $user = UserModel::with('level')->get();
        // dd($user);
        return view('user', ['data' => $user]);
    }

    public function tambah() {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request) {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user');
    }

    public function ubah($id) {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->username');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id) {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}