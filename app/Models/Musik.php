<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musik extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_musik', 'tipe_file', 'nama_artis', 'file_musik', 'gambar_album'];
    protected $table = 'musiks';
}