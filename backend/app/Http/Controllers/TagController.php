<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Controllers\SnippetsController;
use App\Http\Controllers\SnippetTagController;

class TagController extends Controller{

    
    public function addTag($tags){
        $tagNames = explode(" ", $tags); 
        $tag_ids = [];
        foreach($tagNames as $t){
            if (!$this->tagExists($t)){
                $tag = new Tag;
                $tag->name = $t;
                $tag->save();
                $tag_ids[] = $tag->id;
            }
            if(!in_array(Tag::where("name", $t)->value('id'), $tag_ids)){
                $tag_ids[] = Tag::where("name", $t)->value('id');
            }
             
        }
        return $tag_ids;
    }

    public function tagExists($tag){
        $tags = Tag::all();
        $answer = [];
        foreach($tags as $t){
            $answer[] = $t["name"];
        }
        return in_array($tag, $answer);
    }
    
    
    public function test(){
        return app(FavouritesController::class)->hello();
    }
}
