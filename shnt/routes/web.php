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
    
    
    
    


    /**
     * Examination form
     * Add examination
     * used by examcell
     */

    Route::get('schemes', 'examcell@schemes')->name('examcell.scheme');

    Route::get('examination', 'examcell@getexaminationform')->name('examcell.forms.examination');
    Route::post('examination', 'examcell@addexamination');

    Route::get('course', 'examcell@getcourseform')->name('examcell.forms.courses');
    Route::post('course', 'examcell@addcourse');

    Route::get('courses', 'examcell@getexamcourserelationform')->name('examcell.forms.examcourserelation');
    Route::post('courses', 'examcell@addexamcourserelation');
    
    // STUDENT
    Route::get('examform', 'student@getfillexaminationform')->name('student.forms.examform');
    Route::post('examform', 'student@fillexaminationform');
    Route::get('gazette', 'student@viewgazette')->name('student.forms.gazette');
    
    
    // STAFF
    Route::get('addmarks', 'staff@getaddmarksform')->name('staff.forms.addmarks');
    Route::post('addmarks', 'staff@addmarks');

});


// SOHAIL's ROUTES
Route::get('schemes','examcell@schemes')->name('examcell.forms.schemes');
Route::post('schemes','examcell@addscheme');
Route::patch('schemes','examcell@updatescheme');
Route::delete('schemes','examcell@deletescheme');

Route::get('syllabus','examcell@syllabus')->name('examcell.forms.syllabus');

// HARIS's ROUTES
Route::get('seatno','examcell@seatno')->name('examcell.forms.seatno');

Route::get('filldata', function() {
    $student = new \App\Student();
    $student->firstname = "Neelkumar";
    $student->rollnumber = "13CO19";
    $student->email = "neal.bhanushali@gmail.com";
    $student->contact = "9930219856";
    $student->department = "CO";
    $student->save();

    $user = new \App\User();
    $user->username = $student->rollnumber;
    $user->email = $student->email;
    $user->type = 'student';
    $user->password = \Hash::make('asdf');
    $user->active = 1;
    $user->save();

    $staff = new \App\Staff();
    $staff->firstname = "Tabrez";
    $staff->department = "CO";
    $staff->hod = 1;
    $staff->username = "tabrezkhan";
    $staff->email = "tabrezkkhan@gmail.com";
    $staff->contact = "9898989898";
    $staff->save();

    $user = new \App\User();
    $user->username = $staff->username;
    $user->email = $staff->email;
    $user->type = 'staff';
    $user->password = \Hash::make('asdf');
    $user->active = 1;
    $user->save();


    $examcell = new \App\ExamCell();
    $examcell->firstname = "Maruf";
    $examcell->username = "maruf";
    $examcell->email = "maruf@gmail.com";
    $examcell->contact = "9191919191";
    $examcell->save();

    $user = new \App\User();
    $user->username = $examcell->username;
    $user->email = $examcell->email;
    $user->type = 'examcell';
    $user->password = \Hash::make('asdf');
    $user->active = 1;
    $user->save();

    // adding departments
    $d = new \App\Department();
    $d->department = "Computer Engineering";
    $d->dept = "CO";
    $d->years = 4;
    $d->save();

    $d = new \App\Department();
    $d->department = "Mechanical Engineering";
    $d->dept = "ME";
    $d->years = 4;
    $d->save();

    // adding schemes
    $scheme = new \App\Scheme();
    $scheme->scheme = "OLD";
    $scheme->wef = "2007";
    $scheme->save();

    $scheme = new \App\Scheme();
    $scheme->scheme = "CBSGS";
    $scheme->wef = "2012";
    $scheme->save();

    $scheme = new \App\Scheme();
    $scheme->scheme = "CBCGS";
    $scheme->wef = "2016";
    $scheme->save();


    // adding examinations
    $examinations = new \App\Examination();
    $examinations->scheme = "CBSGS";
    $examinations->department = "CO";
    $examinations->semester = 5;
    $examinations->wef = "2012";
    $examinations->save();
    
    // adding courses of 5th sem
    $c = new \App\Course();
    $c->title = "Microprocessor";
    $c->short = "MP";
    $c->code = "CPC501";
    $c->department = "CO";
    $c->semester = "5";
    $c->ia1 = "20";
    $c->ia2 = "20";
    $c->ese = "80";
    $c->tw = "25";
    $c->pror = "25";
    $c->c_th = "4";
    $c->c_pt = "1";
    $c->examination_id = 1;
    $c->save();


    $c = new \App\Course();
    $c->title = "Operating Systems";
    $c->short = "OS";
    $c->code = "CPC502";
    $c->department = "CO";
    $c->semester = "5";
    $c->ia1 = "20";
    $c->ia2 = "20";
    $c->ese = "80";
    $c->tw = "25";
    $c->pror = "25";
    $c->c_th = "4";
    $c->c_pt = "1";
    $c->examination_id = 1;
    $c->save();

    $c = new \App\Course();
    $c->title = "Structured and Object Oriented Analysis and Design";
    $c->short = "SOOAD";
    $c->code = "CPC503";
    $c->department = "CO";
    $c->semester = "5";
    $c->ia1 = "20";
    $c->ia2 = "20";
    $c->ese = "80";
    $c->tw = "25";
    $c->pror = "25";
    $c->c_th = "4";
    $c->c_pt = "1";
    $c->examination_id = 1;
    $c->save();


    $c = new \App\Course();
    $c->title = "Computer Networks";
    $c->short = "CN";
    $c->code = "CPC504";
    $c->department = "CO";
    $c->semester = "5";
    $c->ia1 = "20";
    $c->ia2 = "20";
    $c->ese = "80";
    $c->tw = "25";
    $c->pror = "25";
    $c->c_th = "4";
    $c->c_pt = "1";
    $c->examination_id = 1;
    $c->save();


    $c = new \App\Course();
    $c->title = "Web Technologies Laboratory";
    $c->short = "WTL";
    $c->code = "CPL501";
    $c->department = "CO";
    $c->semester = "5";
    $c->tw = "25";
    $c->pror = "50";
    $c->c_pt = "2";
    $c->examination_id = 1;
    $c->save();


    $c = new \App\Course();
    $c->title = "Business Communication and Ethics";
    $c->short = "BCE";
    $c->code = "CPL502";
    $c->department = "CO";
    $c->semester = "5";
    $c->tw = "25";
    $c->c_pt = "2";
    $c->examination_id = 1;
    $c->save();

    // adding examform
    $ef = new \App\ExamForm();
    $ef->examination_id = 1;
    $ef->rollnumber = "13CO19";
    $ef->seatnumber = "COC5011";
    $ef->month = "december";
    $ef->half = 2;
    $ef->year = 2015;
    $ef->save();

    // marks adding
    $m = new \App\Scores();
    $m->exam_form_id = 1;
    $m->course_id = 1;
    $m->ia1 = 10;
    $m->ia2 = 10;
    $m->ese = 24;
    $m->tw = 18;
    $m->pror = 22;
    $m->save();
});
