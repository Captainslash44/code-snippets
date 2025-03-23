<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;

class LanguageController extends Controller
{
    public function addLanguage(Request $request){
        $name = $request["name"];
        $user = Auth::user();

        if(!$user){
            return response()->json([
                "access" => "denied",
                "message" => "Not logged in"
            ], 401);
        }

        $language = new Language;
        $language->name = $name;
        $language->save();

        return response()->json([
            "success" => true,
            "message" => "language added successfully"
        ]);
    }

    public function getLanguages(){
        $user = Auth::user();

        if(!$user){
            return response()->json([
                "access" => "denied",
                "message" => "Not logged in"
            ], 401);
        }
        return Language::all();
    }
}
