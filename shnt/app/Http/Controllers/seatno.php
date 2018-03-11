<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class seatno extends Controller
{
    public function generateseatno()
    {
        // Student::select('firstname')->where(['department' => 'co', 'sem' => '1'])->get();

        $names = array(
            "Shaikh Haris",
            "Khatri Taufeeq",
            "Khan Sohail",
            "Bhanushali Neel",
            "Khan Bilal",
            "Gauri Javed",
            "Shaikh Kalam",
            "Prasad Suraj",
        );
        $names = JSON.parse($names)
        sort($names);
    
        $listCount =  sizeof($names);
    
        $seatnoSem3 = array();
    
        $dept = "EE";
        $sem = "3";
        if ($dept == "CO")
            $no = "COC3001";
        elseif ($dept == "ME")
            $no = "MEC3001";
        elseif ($dept == "CE")
            $no = "CEC3001";
        elseif ($dept == "EE")
            $no = "EEC3001";
        elseif ($dept == "EX")
            $no = "EXC3001";
    
        for ($i=0; $i < $listCount; $i++) { 
            $seatnoSem3[$i] = $no++;
        }
        echo "Sr No &nbsp&nbsp&nbsp&nbsp Name &nbsp&nbsp&nbsp&nbsp Seat No &nbsp&nbsp&nbsp&nbsp Sign<br>";
        for ($i=0,$token=1; $i < $listCount; $i++,$token++) { 
            echo $token,"&nbsp&nbsp&nbsp&nbsp",$names[$i],"&nbsp&nbsp&nbsp&nbsp",$seatnoSem3[$i],"<br>";
        }
    }
}
