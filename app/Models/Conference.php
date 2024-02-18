<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conference extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'title',
      'subtitle',
      'location',
      'date_start',
      'date_end',
      'greetings',
      'organ_contact_id',
      'editor_contact_id',
    ];

    protected $casts = [
        'title' => 'string',
        'subtitle' => 'string',
        'location' => 'string',
        'date_start' => 'datetime',
        'date_end' => 'datetime',
        'greetings' => 'string',
        'organ_contact_id' => 'integer',
        'editor_contact_id' => 'integer',
    ];

    protected $hidden = [
        'organ_contact_id',
        'editor_contact_id'
    ];

    public function organization()
    {
        return $this->belongsTo(Contact::class, 'organ_contact_id');
    }

    public function editor()
    {
        return $this->belongsTo(Contact::class, 'editor_contact_id');
    }
}
