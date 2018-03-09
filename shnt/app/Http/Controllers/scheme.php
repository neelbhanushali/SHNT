<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheme extends Controller
{
    public function save(Request $request){
        $sch = new \App\Scheme();
        $sch->scheme = $request->scheme;
        $sch->wef = $request->wef;
        $sch->save();
        return view('examcell.forms.schemes');
    }
}
