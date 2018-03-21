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
        $students = \DB::table('scores')->where('scores.course_id', $course->id)->where('exam_forms.kt', 0)->join('exam_forms', 'scores.exam_form_id', '=', 'exam_forms.id')->get();
        $studentskt = \DB::table('scores')->where('scores.course_id', $course->id)->where('exam_forms.kt', 1)->join('exam_forms', 'scores.exam_form_id', '=', 'exam_forms.id')->get();
        // return dd(compact('user', 'course', 'students', 'studentskt'));
        return view('staff.forms.addinternalmarks')->with(compact('user', 'course', 'students', 'studentskt'));
    }

    public function updateinternalmarks(Request $r) {
        $update = [];
        if(!empty($r->input('ia1')))
            $update['ia1'] = $r->input('ia1');
        if(!empty($r->input('ia2')))
            $update['ia2'] = $r->input('ia2');
        if(!empty($r->input('tw')))
            $update['tw'] = $r->input('tw');

        \DB::table('scores')->where('exam_form_id', $r->input('exam_form_id'))->where('course_id', $r->input('course_id'))
            ->update($update);

        $return['title'] = 'Success';
        $return['type'] = 'success';
        $return['message'] = 'Scheme successfully added';
        $return['schemes'] = \App\Scheme::all();
        $return['_token'] = csrf_token();
        return json_encode($return);
    }

    public function allocatefaculties() {
        $user = \App\Staff::find(session()->get('username'));
        
        $staffs = \App\Staff::where('department', $user->department)->get();

        $dept = \App\Department::where('dept', $user->department)->first();

        $courses = [];
        for($i = 1; $i <= (($dept->years)*2); $i++) {
            if($i%2 == 0)
                $examination = \App\Examination::where('wef', '<', \Carbon\Carbon::now()->year)->where('department', $dept->dept)->where('semester', $i)->orderBy('wef', 'desc')->first();
            else 
                $examination = \App\Examination::where('wef', '<=', \Carbon\Carbon::now()->year)->where('department', $dept->dept)->where('semester', $i)->orderBy('wef', 'desc')->first();
            
            if(!empty($examination))
            foreach($course = \DB::table('courses')->where('courses.department', $dept->dept)->where('courses.semester', $i)->where('courses.examination_id', $examination->id)->leftJoin('c_s_rs', 'courses.id', '=', 'c_s_rs.course_id')->select('courses.*','courses.id as c_course_id', 'c_s_rs.*', 'c_s_rs.course_id as a_course_id')->get() as $c) {
                $courses[$i][] = $c;
            }
        }

        // return compact('user', 'staffs', 'courses');
        return view('staff.forms.allocatefaculties')->with(compact('user', 'staffs', 'courses'));
    }

    public function allocatefaculties_(Request $r) {
        return $r->all();
    }
}
