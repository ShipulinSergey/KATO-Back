<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

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

    public function getFullFormAttribute(): string
    {
        $form = null;
        switch ($this->form) {
            case '1':
                $form =  "Доклад + Тезис";
                break;
            case '2':
                $form =  "Тезис или Статья";
                break;
            case '3':
                $form =  'Участник конференции молодых учёных "Батпеновские чтения';
                break;
            case '4':
                $form =  'Слушатель';
                break;
            case '5':
                $form = "Участник выставки ИМН";
        }
        return $form;
    }


}
