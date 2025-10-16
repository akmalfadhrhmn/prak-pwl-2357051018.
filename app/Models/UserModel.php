<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasUuids; // Tambahkan trait ini

    protected $table = 'user'; // sesuaikan nama tabel
    
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
    ];

    public $incrementing = false; // Non-incrementing karena UUID
    protected $keyType = 'string'; // Primary key bertipe string

    // Method getUser jika ada
    public function getUser()
    {
        return $this->join('kelas', 'user.kelas_id', '=', 'kelas.id')
                    ->select('user.*', 'kelas.nama_kelas')
                    ->get();
    }
}