<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Validator route
 * Used to validate things
 */
Route::post('validator', 'ajax@validate_input')->name('validator');

/**
 * All routes with middle ware 'notloggedin'
 * are routes that don't need a session to access
 */
Route::middleware('notloggedin')->group(function() {
    Route::view('register', 'auth.register')->name('register');
    Route::post('register', 'user@register');
    
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', 'user@login');

    Route::view('forgotpassword', 'auth.forgotpassword')->name('forgotpassword');
    Route::post('forgotpassword', 'user@forgotpassword');
    
    Route::get('resetpassword/{username}/{token}', 'user@resetpasswordform');
    Route::post('resetpassword/{username}/{token}', 'user@resetpassword');
});

Route::middleware('loggedin')->group(function() {
    Route::get('logout', 'user@logout')->name('logout');

    Route::get('/', 'user@dashboard')->name('dashboard');

    Route::get('profile', 'user@profile')->name('profile');

    Route::middleware('staff')->group(function() {
        Route::get('addclass','staff@addclass')->name('staff.forms.addclass');

        Route::post('/kamehamehaa',function(Request $r){
            $id = $_POST['id'];
            $rooms = \App\Classrooms::where('floor',$id)->select('roomnumber')->get();
             
            return response()->json($rooms);
        })->name('kamehamehaa');

        Route::post('/classisallotted',function(){
            $ac = new \App\AllottedClass();
            $room = $_POST['roomno'];
            $ac->room = intval($room);
            $intclass = $_POST['classname'];
            $ac->classname = intval($intclass);
            $ac->dept=$_POST['department'];
            $ac->save();
            return "success";
        })->name('classisallotted');

        Route::get('addinternalmarks/{course_id}', 'staff@addinternalmarks')->name('staff.forms.addinternalmarks');
        Route::post('addinternalmarks/{course_id}', 'staff@updateinternalmarks');

        Route::middleware('hod')->group(function() {
            Route::get('allocatefaculties', 'staff@allocatefaculties')->name('staff.form.allocatefaculties');
            Route::post('allocatefaculties', 'staff@allocatefaculties_');
        });
    });

    Route::middleware('student')->group(function() {
        Route::get('examform', 'student@getfillexaminationform')->name('student.forms.examform');
        Route::post('examform', 'student@fillexaminationform');
        Route::get('gazette', 'student@viewgazette')->name('student.forms.gazette');
    });

    Route::middleware('examcell')->group(function() {
        Route::get('schemes', 'examcell@schemes')->name('examcell.scheme');

        Route::get('examination', 'examcell@getexaminationform')->name('examcell.forms.examination');
        Route::post('examination', 'examcell@addexamination');

        Route::get('course', 'examcell@getcourseform')->name('examcell.forms.courses');
        Route::post('course', 'examcell@addcourse');

        Route::get('courses', 'examcell@getexamcourserelationform')->name('examcell.forms.examcourserelation');
        Route::post('courses', 'examcell@addexamcourserelation');

        Route::get('schemes','examcell@schemes')->name('examcell.forms.schemes');
        
        Route::post('schemes','examcell@addscheme');
        Route::patch('schemes','examcell@updatescheme');
        Route::delete('schemes','examcell@deletescheme');


        Route::get('syllabus','examcell@syllabus')->name('examcell.forms.syllabus');
        Route::get('getsyllabus/{id}','examcell@getsyllabus');
        Route::post('syllabus','examcell@addsyllabus');
        Route::patch('syllabus','examcell@updatesyllabus');
        Route::delete('syllabus','examcell@deletesyllabus');

        // HARIS's ROUTES
        Route::get('seatno','examcell@seatno')->name('examcell.forms.seatno');
        Route::post('seatnolist','seatno@generateseatno');
        Route::get('harispractice','harispractice@demo');
    });


});


// DATA FILLING SCRIPTS
Route::get('filldata','filldata@save');
Route::get('filldata/{exam_form_id}', function($exam_form_id) {
    // function exam_scores_filling($exam_form_id) {
        $ef = \App\ExamForm::find($exam_form_id);
        $courses = \App\Course::where('examination_id', $ef->examination_id)->get();

        foreach($courses as $c) {
            $m = new \App\Scores();
            $m->exam_form_id = $exam_form_id;
            $m->course_id = $c->id;
            $m->save();
        }
    // }
});
