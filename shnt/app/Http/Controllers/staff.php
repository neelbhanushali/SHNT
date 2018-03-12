<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staff extends Controller
{
    public function getaddmarksform() {
        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') != 'staff')
            return redirect()->route('dashboard');

        $user = \App\Staff::find(session()->get('username'));

        return view('staff.forms.addmarks')->with(compact('user'));
    }

    public function allocatefaculties(){
        
    }

    public function addmarks(Request $r) {
        \DB::table('scores')->where(['form_id'=>$r->input('form_id'), 'course_id'=>$r->input('course_id')])->update([
            'ia1' => $r->input('ia1'),
            'ia2' => $r->input('ia2'),
            'ese' => $r->input('ese'),
            'tw' => $r->input('tw'),
            'oral' => $r->input('oral'),
            'pror' => $r->input('pror'),
        ]);

        session([
            'messagetype' => 'success',
            'icon' => 'check',
            'message' => 'Marks updated successfully'
            ]);
        
        return redirect()->route('staff.forms.addmarks');
    }
}
