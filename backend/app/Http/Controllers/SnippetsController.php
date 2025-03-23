<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Snippet;
use App\Models\Language;
use App\Models\SnippetTag;


class SnippetsController extends Controller{
    
    public function addSnippet(Request $request){
        $user = Auth::user();

        if(!$user){
            return response()->json([
                "access" => "denied",
            ], 401);
        }

        //adding the snippet
        $title = $request["title"];
        $content = $request["content"];
        $tags = $request["tags"];
        $language = $request["language"];

        $language_id = Language::where("name", $language)->valueOrFail('id');
        
        $snippet = new Snippet;
        $snippet->title = $title;
        $snippet->content = $content;
        $snippet->language_id = $language_id;
        $snippet->save();

        //fetching its id
        $snippet_id = $snippet->id;

        //Adding its tags(if new) to the tags table.
        $newTagIds = [];

        foreach(app(TagController::class)->addTag($tags) as $i){
            $newTagIds[] = $i;
        }
        
        foreach($newTagIds as $t){
            app(SnippetTagController::class)->addSnippetTag($t, $snippet_id);
        }

        return response()->json($newTagIds);
    }

    public function deleteSnippet(Request $request){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                "access" => "denied",
            ], 401);
        }

        $snippet_id = $request["snippet_id"];
        Snippet::where('id', $snippet_id)->delete();
        app(SnippetTagController::class)->deleteSnippetTag($snippet_id);
        app(FavouritesController::class)->removeFromAllFavourites($snippet_id);

        return response()->json([
            "success"=>true,
            "message"=>"snippet deleted successfully",
        ]);

    }

    public function updateSnippet(Request $request){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                "access" => "denied",
            ], 401);
        }

        $id = $request["id"];
        $snippet_title = $request["title"];
        $snippet_content = $request["content"];

        $snippet = Snippet::find($id);
        $snippet->title = $snippet_title;
        $snippet->content = $snippet_content;
        $snippet->save();

        return response()->json([
            "success"=>true,
            "message" => "snippet updated.",
        ]);
    }

    
}
