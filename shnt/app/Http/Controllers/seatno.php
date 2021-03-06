<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class seatno extends Controller
{
    public function generateseatno(Request $r)
    {
        $dept = $r->department;//taking department from request
        $schemes = $r->scheme;//taking scheme from request

        // $sem8temp = \App\AllottedClass::select('room')->where('name', 'BE'.$dept)->get();
        // $sem8names = \App\Student::select('firstname')->where(['department' => $dept, 'class' => $sem8temp[0]->room])->get();

        // query to get list of students of those who are in $dept department and studying in last year
        $sem8names = \DB::table('students')
                    ->join('allotted_classes', 'students.class', '=', 'allotted_classes.room')
                    ->join('exam_forms','students.rollnumber','=','exam_forms.rollnumber')
                    ->select(['lastname','firstname','middlename','mothername'])
                    ->where(['students.department' => $dept,'allotted_classes.classname' => 'BE'.$dept])
                    ->orderBy('kt')
                    ->orderBy('lastname')
                    ->orderBy('firstname')
                    ->orderBy('middlename')
                    ->orderBy('mothername')
                    ->get();

        // $alreadyDone = Seatno::select('flag')->where('department' => $r->department);
        // DB::table('examinations')
        //     ->join('courses','examinations.id', '=', 'courses.examination_id')
        //     ->select('examinations.scheme', 'courses.short')
        //     ->get();
        $sem8namesarray = array();
        $i = 0;
        foreach ($sem8names as $semt){
            $sem8namesarray[$i++] = $semt->lastname.' '.$semt->firstname.' '.$semt->middlename.' '.$semt->mothername;
        }
        $names = array(
            "Shaikh Haris",
            "Khatri Taufeeq",
            "Khan Sohail",
            "Bhanushali Neel",
            "Khan Bilal",
            "Gauri Javed",
            "Shaikh Kalam",
            "Shaikh Shahbaz",
            "Prasad Suraj",
            "Deshmukh Ravish",
            "Shaikh Faizan",
            "Shaikh Farhan",
            "Khan Shayana"
        );

        $name = array_sort_recursive($names);// sorting of an array
        
        $listCount =  sizeof($name); // finding length
    
        $sem1 = array();
        $sem2 = array();
        $sem3 = array();
        $sem4 = array();
        $sem5 = array();
        $sem6 = array();
        $sem7 = array();
        $sem8 = array();

        $sch = '';
        if ($schemes == 'CBSGS'){
            $sch .= 'C';
        }
        else if($schemes == 'CBCGS'){
            $sch .= 'CB';
        }else{
            $sch .= 'OLD';
        }
        $no = '1001';
        for ($j=0; $j < $listCount; $j++) {
            $sem1[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem2[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem3[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem4[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem5[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem6[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem7[$j] = $dept.$sch.$no;
            $no+=1000;
            $sem8[$j] = $dept.$sch.$no;
            $no -= 6999;
        }

        return view('examcell.forms.seatnolist',[ 'sem1' => $sem1,
                                            'sem2' => $sem2,
                                            'sem3' => $sem3,
                                            'sem4' => $sem4,
                                            'sem5' => $sem5,
                                            'sem6' => $sem6,
                                            'sem7' => $sem7,
                                            'sem8' => $sem8,
                                            'names' => $name,
                                            'sem8namesarray' => $sem8namesarray
                                        ]);
    }
}
