<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyboardCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'keyboard_categories';

    protected $fillable = [
        'name',
        'image',
    ];

    public function keyboards() {
        return $this->hasMany(Keyboard::class, 'category_id', 'id');
    }
}
