<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTask extends Model
{
    public $table = 'todoapptbl';
    function user() {
        return $this->belongsTo(User::class);
    }
}
