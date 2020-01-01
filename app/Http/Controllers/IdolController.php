<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

class IdolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type = $request->input('type') ?: false;
        if(!empty($type) and array_search($type,config('ouranos.acceptableTypes')) === false){
            abort(404,__('messages.idol.index.incorrect'));
        }elseif(!empty($type)){
            $idols = \App\Idol::select()->leftjoin('c_k_names','idols.id','=','c_k_names.idol_id')->where('type',$type)->get();
            if($idols->isEmpty()) abort(404);
            $idol_count = $idols->count();
        }else{
            $idols = \App\Idol::select()->leftjoin('c_k_names','idols.id','=','c_k_names.idol_id')->get();
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($name_r)
    {
        try{
            $idol = \App\Idol::select('idols.*','c_k_names.id as cknameid','c_k_names.name_zh','c_k_names.name_ko',
                'c_k_names.name_zh_separate','c_k_names.name_ko_separate',
                'c_k_names.subname_zh','c_k_names.subname_ko')
                ->leftjoin('c_k_names','idols.id','=','c_k_names.idol_id')
                ->where('name_r', 'like', $name_r)->firstOrFail();
        }catch(ModelNotFoundException $e){
            abort(404);
        }
        $name = 'name';
        switch (\App::getLocale()){
            case 'ja':
                break;
            case 'en':
                $name .= '_r'; break;
            default:
                $name .= '_'.\App::getLocale();
        }
        if(empty($idol->$name)) $name = 'name_r'; //fallback
        $separate = $name.'_separate';
        $title = ucwords(separateString($idol->$name,$idol->$separate));
        return view('idol.show',compact('idol','title','name'));
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
