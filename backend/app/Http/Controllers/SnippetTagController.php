<?php

namespace App\Http\Controllers;

use App\Models\SnippetTag;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;

class SnippetTagController extends Controller{
    
    public function addSnippetTag($tag_id, $snippet_id){

        $snippetTag = new SnippetTag;
        $snippetTag->tag_id = $tag_id;
        $snippetTag->snippet_id = $snippet_id;
        $snippetTag->save();

        return response()->json([
            "success" => true,
            "message" => "snippet added successfully",
        ]);
    }

   public function deleteSnippetTag($snippet_id){

    SnippetTag::where('snippet_id', $snippet_id)->delete();
    
   }
}
