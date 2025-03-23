<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Snippet;

class Favourite extends Model{
    
    public function users(){
        return $this->belongstoMany(User::class);

    }

    public function snippets(){
        return $this->belongstoMany(Snippet::class);
        
    }
}
