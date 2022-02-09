<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyboard extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'keyboards';

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(KeyboardCategory::class);
    }
}
