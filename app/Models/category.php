<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'id',
        'name',
    ];

    public function portofolio():HasMany
    {
        return $this->hasMany(portofolio::class);
    }
}
