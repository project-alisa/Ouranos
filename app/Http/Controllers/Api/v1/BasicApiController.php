<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request; <- そのうちいる

class BasicApiController extends Controller
{
    public function status(){
        $return['appname'] = config('app.name');
        $version = explode(' ',config('ouranos.version'));
        $return['version'] = $version[0];
        $return['release_name'] = $version[1] ?: null;
        $return['sitename'] = config('ouranos.sitename');
        $return['birthday'] = getIdolByBirthdate();
        return response()->json($return);
    }
}
