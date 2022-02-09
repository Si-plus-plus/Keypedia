<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transactions';

    protected $fillable = [
        'transaction_id',
        'keyboard_id',
        'qty',
    ];

    public function transaction() {
        return $this->belongsTo(HeaderTransaction::class);
    }

    public function keyboard() {
        return $this->belongsTo(Keyboard::class)->withTrashed();;
    }
}
