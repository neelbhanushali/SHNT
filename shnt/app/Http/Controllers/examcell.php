<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class examcell extends Controller
{
    public function schemes() {
        $user = \App\ExamCell::find(session()->get('username'));

        return view('examcell.forms.schemes')->with(compact('user'));
    }

    public function syllabus() {
        $user = \App\ExamCell::find(session()->get('username'));
        
        return view('examcell.forms.syllabus')->with(compact('user'));
    }

    public function getexaminationform() {
        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') != 'exam_cell')
            return redirect()->route('dashboard');

        $user = \App\ExamCell::find(session()->get('username'));

        return view('examcell.forms.examination')->with(compact('user'));
    }

    public function addexamination(Request $r) {
        $e = new \App\Examination();
        $e->title = $r->input('title');
        $e->department = $r->input('department');
        $e->semester = $r->input('semester');
        $e->half = $r->input('half');
        $e->year = $r->input('year');
        $e->save();

        session([
            'messagetype' => 'success',
            'icon' => 'check',
            'message' => 'Examination added successfully'
            ]);
        
        return redirect()->route('examcell.forms.examination');
    }

    public function getcourseform() {
        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') != 'exam_cell')
            return redirect()->route('dashboard');

        $user = \App\ExamCell::find(session()->get('username'));

        return view('examcell.forms.courses')->with(compact('user'));
    }

    public function addcourse(Request $r) {
        $c = new \App\Course();
        
        foreach($r->all() as $key => $value)
            $c->$key = $value;

        unset($c->_token);
        unset($c->submit);

        $c->save();

        session([
            'messagetype' => 'success',
            'icon' => 'check',
            'message' => 'Course added successfully'
            ]);
        
        return redirect()->route('examcell.forms.courses');
    }

    public function getexamcourserelationform() {
        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') != 'exam_cell')
            return redirect()->route('dashboard');

        $user = \App\ExamCell::find(session()->get('username'));

        return view('examcell.forms.examcourserelation')->with(compact('user'));
    }

    public function addexamcourserelation(Request $r) {
        $ecr = new \App\ExamCourseRelation();
        $ecr->examination_id = $r->input('examination_id');
        $ecr->course_id = $r->input('course_id');
        $ecr->start = $r->input('start');
        $ecr->end = $r->input('end');
        $ecr->save();

        session([
            'messagetype' => 'success',
            'icon' => 'check',
            'message' => 'Course added to Examination.'
            ]);
        
        return redirect()->route('examcell.forms.examcourserelation');
    }
}
