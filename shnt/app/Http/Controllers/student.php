<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class student extends Controller
{
    public function getfillexaminationform() {
        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') != 'student')
            return redirect()->route('dashboard');

        $user = \App\Student::find(session()->get('username'));

        return view('student.forms.examform')->with(compact('user'));
    }

    public function fillexaminationform(Request $r) {
        $form = new \App\Form();
        $form->examination_id = $r->input('examination_id');
        $form->rollnumber = $r->input('rollnumber');
        $form->save();

        foreach($courses = \App\ExamCourseRelation::where('examination_id', $form->examination_id)->get() as $course) {
            $s = new \App\Scores();
            $s->form_id = $form->id;
            $s->course_id = $course->course_id;
            $s->save();
        }

        session([
            'messagetype' => 'success',
            'icon' => 'check',
            'message' => 'Form submitted successfully'
            ]);
        
        return redirect()->route('student.forms.examform');
    }

    public function viewgazette() {
        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') != 'student')
            return redirect()->route('dashboard');

        $user = \App\Student::find(session()->get('username'));

        return view('student.forms.gazette')->with(compact('user'));
    }
}
