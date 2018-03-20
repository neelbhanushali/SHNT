<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staff extends Controller
{

    // SOHAIL'S CHANGES DO NOT DELETE STARTS
    
    public function addclass(){
        // if(!session()->has('logintoken')){
        //     return redirect()->route('login');
        // }
        
        // if(!session()->get('type') != 'staff'){
        //     return redirect()->route('dashboard');                
        // }

        $user = \App\Staff::find(session()->get('username'));
        return view('staff.forms.addclass')->with(compact('user'));
    }

    // SOHAIL'S CHANGES DO NOT DELETE ENDS


    // public function getaddmarksform() {
    //     if(!session()->has('logintoken'))
    //         return redirect()->route('login');

    //     if(session()->get('type') != 'staff')
    //         return redirect()->route('dashboard');

    //     $user = \App\Staff::find(session()->get('username'));

    //     return view('staff.forms.addmarks')->with(compact('user'));
    // }

    // public function allocatefaculties(){
    //     if(!session()->has('logintoken'))
    //         return redirect()->route('login');

    //     if(session()->get('type') != 'staff')
    //         return redirect()->route('dashboard');

    //     $user = \App\Staff::find(session()->get('username'));

    //     return view('staff.hod.allocatefaculties')->with(compact('user'));
    // }

    // public function addmarks(Request $r) {
    //     \DB::table('scores')->where(['form_id'=>$r->input('form_id'), 'course_id'=>$r->input('course_id')])->update([
    //         'ia1' => $r->input('ia1'),
    //         'ia2' => $r->input('ia2'),
    //         'ese' => $r->input('ese'),
    //         'tw' => $r->input('tw'),
    //         'oral' => $r->input('oral'),
    //         'pror' => $r->input('pror'),
    //     ]);

    //     session([
    //         'messagetype' => 'success',
    //         'icon' => 'check',
    //         'message' => 'Marks updated successfully'
    //         ]);
        
    //     return redirect()->route('staff.forms.addmarks');
    // }

    public function addinternalmarks($course_id) {
        $user = \App\Staff::find(session()->get('username'));
        $course = \App\Course::find($course_id);
        $students = \DB::table('scores')->where('scores.course_id', $course->id)->join('exam_forms', 'scores.exam_form_id', '=', 'exam_forms.id')->get();
        // return dd(compact('user', 'course', 'students'));
        return view('staff.forms.addinternalmarks')->with(compact('user', 'course', 'students'));
    }

    public function updateinternalmarks(Request $r) {
        \DB::table('scores')->where('exam_form_id', $r->input('exam_form_id'))->where('course_id', $r->input('course_id'))
            ->update([
                    'ia1' => $r->input('ia1'),
                    'ia2' => $r->input('ia2'),
                    'tw' => $r->input('tw'),
                    'updated_at' => \Carbon\Carbon::now()
                ]);

        $return['title'] = 'Success';
        $return['type'] = 'success';
        $return['message'] = 'Scheme successfully added';
        $return['schemes'] = \App\Scheme::all();
        $return['_token'] = csrf_token();
        return json_encode($return);
    }

    public function allocatefaculties() {
        $user = \App\Staff::find(session()->get('username'));
        
    }
}
