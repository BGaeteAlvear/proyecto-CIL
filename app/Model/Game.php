<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'id' ,'name' ,'cover' ,'price' , 'stock', 'description' ,'plataforms_id' ,'categories_id','game_types_id', 'companies_id',
    ];
}
