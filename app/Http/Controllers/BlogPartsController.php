<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BlogPartsController extends Controller
{
    public function idol(Request $request){
        $id = $request->get('id');
        if(empty($id) || !is_numeric($id)){
            $message = 'パラメータが指定されていないか、形式が正しくありません';
            return response(view('blogparts.error',compact('message')),400);
        }
        try {
            $idol = \App\Idol::findOrFail($id);
        }catch (ModelNotFoundException $e){
            $message = '該当するアイドルは存在しないか、メメントしてしまいました';
            return response(view('blogparts.error',compact('message')),404);
        }
        return view('blogparts.idol',compact('idol'));
    }
}
