<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function snippet(){
        return $this->hasMany(Snippet::class);
    }
}
