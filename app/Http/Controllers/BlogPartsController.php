<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BlogPartsController extends Controller
{
    public function idol(Request $request){
        $id = $request->get('id');
        try {
            $idol = \App\Idol::findOrFail($id);
        }catch (ModelNotFoundException $e){
            http_response_code(404);
            $message = '該当するアイドルが見つからなかったかパラメータ漏れです';
            return view('blogparts.error',compact('message'));
        }
        return view('blogparts.idol',compact('idol'));
    }
}
