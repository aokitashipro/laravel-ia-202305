<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact_to',
        'message',
    ];
}
