<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SnippetTag extends Model{
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function snippets(){
        return $this->belongsToMany(Snippet::class);
    }
}
