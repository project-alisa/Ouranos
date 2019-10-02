<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class IdolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Input::get('type') ?: false;
        if(!empty($type) and array_search($type,config('ouranos.acceptableTypes')) === false){
            abort(404,__('messages.idol.index.incorrect'));
        }elseif(!empty($type)){
            $idols = \App\Idol::where('type',$type)->get();
            if($idols->isEmpty()) abort(404);
            $idol_count = $idols->count();
        }else{
            $idols = \App\Idol::all();
            $idol_count = $idols->count();
        }
        return view('idol.index',compact('idols','type','idol_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  string  $name_r
     * @return \Illuminate\Http\Response
     */
    public function show($name_r)
    {
        $idol = \App\Idol::where('name_r', 'like', $name_r)->firstOrFail();
        return view('idol.show',compact('idol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/
}
