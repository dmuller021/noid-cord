<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friends extends Model
{
    use HasFactory;

    protected $table = 'friends';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id_1', 'user_id_2'];

//    public function friends($filled_id)
//    {
//    return friends::where('id', $filled_id)->get();
//    }

    public function user()
    {
        return $this->belongsToMany('User');
    }
}
