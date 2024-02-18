<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
      'type',
      'email',
      'phone',
      'value'
    ];

    protected $hidden = [
      'created_at',
      'updated_at'
    ];
}
