<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['jenis'];

    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
