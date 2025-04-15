<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Animal extends Model
{
    protected $fillable = ['nome','peso','idade','imagem','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
