<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];
        return view('list_user', $data);
    }

    public function create(){
       $kelas = $this->kelasModel->all(); // Langsung pakai all()
       $data = [
         'title' => 'Create User',
         'kelas' => $kelas,
       ];
       return view('create_user', $data);
    }

    public function store(Request $request){
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm'=> $request->input('npm'),
            'kelas_id'=> $request->input('kelas_id'),
        ]);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Method EDIT - Menampilkan form edit
    public function edit($id){
        $user = $this->userModel->find($id);
        
        // Validasi jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('user.index')
                           ->with('error', 'User tidak ditemukan');
        }
        
        $kelas = $this->kelasModel->all(); // Gunakan all()
        
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];
        
        return view('edit_user', $data);
    }

    // Method UPDATE - Memproses update data
    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
        ]);

        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->route('user.index')
                           ->with('error', 'User tidak ditemukan');
        }
        
        $user->update([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->route('user.index')
                       ->with('success', 'Data berhasil diperbarui');
    }

    // Method DESTROY - Menghapus data
    public function destroy($id){
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->route('user.index')
                           ->with('error', 'User tidak ditemukan');
        }
        
        $user->delete();

        return redirect()->route('user.index')
                       ->with('success', 'Data Berhasil Dihapus');
    }
}