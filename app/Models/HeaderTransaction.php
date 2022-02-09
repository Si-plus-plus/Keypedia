<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model
{
    use HasFactory;

    protected $table = 'header_transactions';

    protected $fillable = [
        'date',
        'user_id',
    ];

    public function items() {
        return $this->hasMany(DetailTransaction::class, 'transaction_id', 'id');
    }
}
