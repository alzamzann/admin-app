<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $fillable = ['namaBarang', 'deskripsi', 'jenis', 'harga', 'foto'];
    protected $dates = ['created_at', 'updated_at'];
}
