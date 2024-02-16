<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';
    protected $guarded = false;

    protected $fillable = [
        'name',
        'surname',
        'lastname',
        'position',
        'email',
        'phone',
        'job',
        'form',
        'in_kata',
        'notify',
        'сonsent_status',
    ];

}
