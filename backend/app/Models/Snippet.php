<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SnippetTag;
use App\Models\Language;

class Snippet extends Model{
    
   public function snippetTags(){
    return $this->belongsToMany(SnippetTag::class);
   }

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function favourite(){
        return $this->belongsToMany(Favourite::class);
    }
}
