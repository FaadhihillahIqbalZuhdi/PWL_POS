<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{
    use HasFactory;
    protected $table = 'm_level';        //mendefinisikan nama tabel yang digunakan LevelModel
    protected $primaryKey = 'level_id';  //mendefinisikan primary key dari tabel yang digunakan
    protected $fillable = ['level_id', 'level_kode', 'level_nama'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}