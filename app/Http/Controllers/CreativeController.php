<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Creative;


class CreativeController extends Controller
{
    public function user($creative_id) {
        $creative = Creative::find($creative_id);
        if ($creative) {
            return $creative->user;
        } 
        return response()->json(["message" => "Creative ID does not exist"]);
    }
}
