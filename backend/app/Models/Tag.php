<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Snippet;
use App\Models\SnippetTag;


class Tag extends Model{

    protected $fillable = [
        'name',
    ];
    
    public function snippetTags(){
        return $this->belongsToMany(SnippetTag::class);
    }

    public function snippet(){
        return $this->hasMany(Snippet::class);
    }
}
