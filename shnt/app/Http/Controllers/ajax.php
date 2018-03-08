<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajax extends Controller
{
    public function validate_input(Request $r) {
        if($r->has('email')) {
            $foundinstudent = false;
            $result = \App\Student::where('email', $r->input('email'))->get();
            
            $foundinstudent = (count($result)) ? true : false;

            $foundinstaff = false;
            $result = \App\Staff::where('email', $r->input('email'))->get();
            
            $foundinstaff = (count($result)) ? true : false;

            $foundinexamcell = false;
            $result = \App\ExamCell::where('email', $r->input('email'))->get();
            
            $foundinexamcell = (count($result)) ? true : false;

            $found = $foundinstudent || $foundinstaff || $foundinexamcell;

            die(json_encode(!$found));
        }

        if($r->has('contact')) {
            $foundinstudent = false;
            $result = \App\Student::where('contact', $r->input('contact'))->get();
            
            $foundinstudent = (count($result)) ? true : false;

            $foundinstaff = false;
            $result = \App\Staff::where('contact', $r->input('contact'))->get();
            
            $foundinstaff = (count($result)) ? true : false;

            $foundinexamcell = false;
            $result = \App\ExamCell::where('contact', $r->input('contact'))->get();
            
            $foundinexamcell = (count($result)) ? true : false;

            $found = $foundinstudent || $foundinstaff || $foundinexamcell;

            die(json_encode(!$found));
        }

        if($r->has('username')) {
            $foundinstaff = false;
            $result = \App\Staff::where('username', $r->input('username'))->get();
            
            $foundinstaff = (count($result)) ? true : false;

            $foundinexamcell = false;
            $result = \App\ExamCell::where('username', $r->input('username'))->get();
            
            $foundinexamcell = (count($result)) ? true : false;

            $found = $foundinstaff || $foundinexamcell;

            die(json_encode(!$found));
        }

        if($r->has('rollnumber')) {
            $foundinstudent = false;
            $result = \App\Student::where('rollnumber', $r->input('rollnumber'))->get();
            
            $foundinstudent = (count($result)) ? true : false;

            die(json_encode(!$foundinstudent));
        }
    }
}
