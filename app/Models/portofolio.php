<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

    protected $fillable = [
        'title',
        'image',
        'description',
        'category_id',
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
