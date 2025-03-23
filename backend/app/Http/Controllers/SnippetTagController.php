<?php

namespace App\Http\Controllers;

use App\Models\SnippetTag;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

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

   public function searchByTag(Request $request){

    $user = Auth::user();
    if(!$user){
        return response()->json([
            "access" => "denied",
        ], 401);
    }

    if($request->exists("tag")){
        $tag = $request["tag"];
        $tag_id = Tag::where('name', $tag)->value('id');
        $snippet_id = SnippetTag::where('tag_id', $tag_id)->get("snippet_id");
        $snippets = [];

        foreach($snippet_id as $s){
            $snippets[] = app(SnippetsController::class)->getSnippetById($s["snippet_id"]);
        }
        return response()->json($snippets);
    }

   }
}
