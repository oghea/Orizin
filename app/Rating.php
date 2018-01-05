<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'game_rating';
    protected $fillable = ['users','game_id','rate'];
    public $timestamps = false;

    public function Users()
    {
        return $this->belongsTo('App\User','users');
    }

    public function Games()
    {
        return $this->belongsTo('App\Game','game_id');
    }
}
