<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;

class FavouritesController extends Controller{
    
    public function addToFavourites(Request $request){
        $id = Auth::id();
        $snippet_id = $request["snippet_id"];
        $favourite = new Favourite;
        $favourite->user_id = $id;
        $favourite->snippet_id = $snippet_id;
        $favourite->save();

        return response()->json([
            "success" => true,
            "message" => "added to favourites",
        ]);
    }

    public function removeFromFavourites(Request $request){
        $id = Auth::id();
        $snippet_id = $request["snippet_id"];
        Favourite::where('user_id', $id)->where('snippet_id', $snippet_id)->delete();

        return response()->json([
            "success"=>true,
            "message"=>"snippet removed from favourites"]);
    }

    public function removeFromAllFavourites($snippet_id){
        Favourite::where('snippet_id', $snippet_id)->delete();
        
    }
}
