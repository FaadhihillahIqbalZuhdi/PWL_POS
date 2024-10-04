<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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

    // Ambil data user dalam bentuk JSON untuk DataTables
public function list(Request $request)
{
    // Ambil data dari model UserModel dan relasinya dengan Level
    $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
        ->with('level');

    // Filter data user berdasarkan level_id jika ada
    if ($request->level_id) {
        $users->where('level_id', $request->level_id);
    }

    // Return data dalam format DataTables
    return DataTables::of($users)
        ->addIndexColumn() // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addColumn('aksi', function ($user) { // Menambahkan kolom aksi dengan tombol-tombol
            $btn = '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
            return $btn;
        })
        ->rawColumns(['aksi']) // Memberitahu bahwa kolom 'aksi' berisi HTML
        ->make(true);
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

    public function create_ajax()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view ('user.create_ajax')
            ->with('level', $level);
    }

    public function store_ajax(Request $request) {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|integer|min:3|unique:m_user,username',
                'nama' => 'required|integer|string|max:100',
                'password' => 'required|min:6',
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, //response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors(), //pesan error validasi
                ]);
            }

            UserModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id','level_nama')->get();
        
        return view('user.edit_ajax', ['user' => $user,'level'=> $level]);
    }

    public function update_ajax(Request $request, $id)
    {
        // Cek apakah request berasal dari AJAX atau JSON request
        if ($request->ajax() || $request->wantsJson()) {

            // Definisikan aturan validasi untuk data yang diterima
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'required|max:100',
                'password' => 'nullable|min:6|max:20'
            ];

            // Lakukan validasi data berdasarkan aturan yang telah ditentukan
            $validator = Validator::make($request->all(), $rules);

            // Jika validasi gagal, kembalikan respon JSON dengan error message
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // Menunjukkan field mana yang mengalami error
                ]);
            }  

            // Cari data user berdasarkan ID yang diterima
            $check = UserModel::find($id);

            // Jika data user ditemukan
            if ($check) {
            // Jika password tidak diisi, hapus dari request agar tidak diupdate
            if (!$request->filled('password')) {
                $request->request->remove('password');
            }

            // Lakukan update data
            $check->update($request->all());

            // Kembalikan respon JSON dengan status berhasil
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate'
            ]);
            } else {
                // Jika data user tidak ditemukan, kembalikan respon JSON dengan status gagal
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }   

        // Jika bukan AJAX request, redirect ke halaman utama
        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $user = UserModel::find($id);
        return view('user.confirm_ajax', ['user' => $user]);
    }

    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
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