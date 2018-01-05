<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table = 'checkout';
    protected $primaryKey ='id';
    protected $fillable = ['user_id','game_qty','total_price'];
    public $timestamps = true;

    public function Users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
