<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamePurchased extends Model
{
    protected $primaryKey ='id';
    protected $table = 'game_purchased';
    protected $fillable = ['users','game_id','qty'];
    public $timestamps = true;

    public function Users()
    {
        return $this->belongsTo('App\User','users');
    }

    public function Games()
    {
        return $this->belongsTo('App\Game','game_id');
    }
}
