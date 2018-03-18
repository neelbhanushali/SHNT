<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class harispractice extends Controller
{
    public function demo(){
        // $h = "1001";
        // $h .= 'haris';
        // echo $h;

        // $no = '1001';
        // for ($j=0; $j < 8; $j++) {
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no+=1000;
        //     echo $no."<br>";
        //     $no - 7999;
        // }


        // $no = $dept.$sch.'1001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem1[$i] = $no++;
        // }
        // $no = $dept.$sch.'2001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem2[$i] = $no++;
        // }
        // $no = $dept.$sch.'3001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem3[$i] = $no++;
        // }
        // $no = $dept.$sch.'4001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem4[$i] = $no++;
        // }
        // $no = $dept.$sch.'5001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem5[$i] = $no++;
        // }
        // $no = $dept.$sch.'6001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem6[$i] = $no++;
        // }
        // $no = $dept.$sch.'7001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem7[$i] = $no++;
        // }
        // $no = $dept.$sch.'8001';
        // for ($i=0; $i < $listCount; $i++) { 
        //     $sem8[$i] = $no++;
        // }
        
        // dd($sem1);
        // echo "Sr No &nbsp&nbsp&nbsp&nbsp Name &nbsp&nbsp&nbsp&nbsp Seat No &nbsp&nbsp&nbsp&nbsp Sign<br>";
        // for ($i=0,$token=1; $i < $listCount; $i++,$token++) { 
        //     echo $token,"&nbsp&nbsp&nbsp&nbsp",$names[$i],"&nbsp&nbsp&nbsp&nbsp",$sem3[$i],"<br>";
        // }
        
        // $q = \DB::table('examinations')
        //     ->join('courses','examinations.id', '=', 'courses.examination_id')
        //     ->select('examinations.scheme', 'courses.semester')
        //     ->get();
        //     var_dump($q);

        // $q = \App\Course::select('examination_id')->where('short','MP')->get();
        
        // echo \App\Examination::select('department')->where('id',$q[0]->examination_id)->get();


        $dept = "CO";//taking department from request
        $schemes = "CBSGS";//taking scheme from request

        $sem8temp = \App\AllottedClass::select('room')->where('name', 'BE'.$dept)->get();
        $sem8names = \App\Student::select('firstname')->where(['department' => $dept, 'class' => $sem8temp[0]->room])->get();
        // $alreadyDone = Seatno::select('flag')->where('department' => $r->department);
        // DB::table('examinations')
        //     ->join('courses','examinations.id', '=', 'courses.examination_id')
        //     ->select('examinations.scheme', 'courses.short')
        //     ->get();
        $sem8namesarray = array();
        $i = 0;
        foreach ($sem8names as $semt){
            $sem8namesarray[$i++] = $semt->firstname;
        }
        print_r($sem8namesarray);

    }
}
