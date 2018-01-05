<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';
    protected $primaryKey ='id';
    protected $fillable = ['game_name','price','date','genre','images'];
    public $timestamps = true;

    public function Genre()
    {
        return $this->belongsTo('App\Genre','genre');
    }
}
