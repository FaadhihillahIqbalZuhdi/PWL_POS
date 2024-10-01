<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    // Menampilkan halaman awal user
    public function index() 
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];

        $activeMenu = 'user'; // Set menu yang sedang aktif

        $level = LevelModel::all(); // ambil data level untuk filter level

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        // Pastikan bahwa permintaan adalah dari AJAX
        if ($request->ajax()) {
            $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
                ->with('level');

            if ($request->level_id) {
                $users->where('level_id', $request->level_id);
            }

            return DataTables::of($users)
                // Menampilkan kolom index/no urut (default nama kolom: DT_RowIndex)
                ->addIndexColumn()
                ->addColumn('aksi', function ($user) {
                    $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . 
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                    return $btn;
                })
            ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401); // Tangani permintaan yang tidak sah
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah'],
        ];

        $page = (object) [
            'title' => 'Tambah user baru',
        ];

        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama'     => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer' 
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id) 
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail user'
        ];

        $activeMenu = 'user';

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id) 
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user';

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'username' => 'required|string|min:3|unique:m_user,'.$id.'user_id',
            'nama'     => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer' 
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    // Menghapus data pada user
    public function destroy(string $id) 
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try{
            UserModel::destroy($id);
            return redirect('/user')->with('success','Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    
    // public function tambah() {
    //     return view('user_tambah');
    // }
    
    // public function tambah_simpan(Request $request) {
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make('$request->password'),
    //         'level_id' => $request->level_id,
    //     ]);

    //     return redirect('/user');
    // }

    // public function ubah($id) {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }

    // public function ubah_simpan($id, Request $request) {
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make('$request->username');
    //     $user->level_id = $request->level_id;

    //     $user->save();

    //     return redirect('/user');
    // }

    // public function hapus($id) {
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }

    // public function index()
    // {
    //     // Jobsheet 3
    //     // tambah data user dengan Eloquent Model
    //     // $data = [
    //     //     'username' => 'customer-1',
    //     //     'nama' => 'Pelanggan',
    //     //     'password' => Hash::make('12345'),
    //     //     'level_id' => 4,
    //     // ];
    //     // UserModel::insert( $data ); // tambahkan data ke tabel m_user

    //     // tambah data user dengan Eloquent Model
    //     // $data = [
    //     //     'nama' => 'Pelanggan Pertama',
    //     // ];
    //     // UserModel::where('username', 'customer-1')->update($data); // update data user

    //     // // Coba askses model UserModel
    //     // $user = UserModel::all(); // ambil semua data dari tabel m_user
    //     // return view('user', ['data' => $user]);

    //     // Jobsheet 4
    //     // $data = [
        //     //     'level_id' => 2,
        //     //     'username' => 'manager_tiga',
        //     //     'nama' => 'Manager 3',
        //     //     'password' => Hash::make('12345')
        //     // ];
        //     // UserModel::create($data);
    
        //     // Praktikum 2.3
        //     // $user = UserModel::where('level_id', 2)->count();
        //     // // dd($user);
        //     // return view('user', ['data' => $user]);
    
        //     // Praktikum 2.4
        //     // $user = UserModel::firstOrNew(
        //     //     [
        //     //         'username' => 'manager33',
        //     //         'nama' => 'Manager Tiga TIga',
        //     //         'password' => Hash::make('12345'),
        //     //         'level_id' => 2,
        //     //     ],
        //     // );
        //     // $user->save();
        //     // return view('user', ['data' => $user]);
    
        //     // Praktikum 2.5
        //     // $user = UserModel::create([
        //     //     'username' => 'manager55',
        //     //     'nama' => 'Manager55',
        //     //     'password' => Hash::make('12345'),
        //     //     'level_id' => 2,
        //     // ]);
    
        //     // $user->username = 'manager56';
    
        //     // $user->isDirty(); //true
        //     // $user->isDirty('username'); //false
        //     // $user->isDirty('nama'); // true
        //     // $user->isDirty(['nama', 'username']); // false
    
        //     // $user->isClean(); // false
        //     // $user->isClean('username'); // false
        //     // $user->isClean('nama'); // true
        //     // $user->isClean(['nama', 'username']); // false
    
        //     // $user->save();
    
        //     // $user->isDirty(); // false
        //     // $user->isClean(); // true
        //     // dd($user->isDirty());
    
        //     // $user = UserModel::create([
        //     //     'username' => 'manager11',
        //     //     'nama' => 'Manager11',
        //     //     'password' => Hash::make('12345'),
        //     //     'level_id' => 2,
        //     // ]);
    
        //     // $user->username = 'manager12';
    
        //     // $user->save();
    
        //     // $user->wasChanged();
        //     // $user->wasChanged('username');
        //     // $user->wasChanged(['username', 'level_id']);
        //     // $user->wasChanged('nama');
        //     // dd($user->wasChanged(['nama', 'username']));
    
        //     // Praktikum 2.6
        //     // $user = UserModel::all();
        //     // return view('user', ['data' => $user]);
    
        //     // Praktikum 2.7
        //     $user = UserModel::with('level')->get();
        //     // dd($user);
        //     return view('user', ['data' => $user]);
        // }
}