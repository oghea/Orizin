<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey ='id';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function GameGenre()
    {
        return $this->hasMany('App\Game');
    }
}
