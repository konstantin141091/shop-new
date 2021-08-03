<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'sale',
    ];

    public static function attributesName() {
        return [
            'name' => "Категория",
            'slug' => "Категория", //не знаю что написать
            'sale' => "Скидка",
        ];
    }

    public static function rules()
    {
        return [
            'name' => "required|max:100",
            'slug' => "required|max:100",
            'sale' => "digits_between:0,100",
        ];
    }
}
