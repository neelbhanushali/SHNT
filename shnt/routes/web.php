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
    // Route::get('addmarks', 'staff@getaddmarksform')->name('staff.forms.addmarks');
    // Route::post('addmarks', 'staff@addmarks');
    // Route::get('class', 'staff@addclass')->name('staff.forms.class');
    // Route::get('allocatefaculties', 'staff@allocatefaculties')->name('staff.forms.allocatefaculties');
    // Route::get('addmarks', 'staff@addmarks')->name('staff.forms.marks');

});


// SOHAIL's ROUTES
Route::get('schemes','examcell@schemes')->name('examcell.forms.schemes');
Route::post('schemes','examcell@addscheme');
Route::patch('schemes','examcell@updatescheme');
Route::delete('schemes','examcell@deletescheme');
// HOD ROUTES
    // addclass route
    Route::get('addclass','staff@addclass')->name('staff.forms.addclass');
    // gets roomnumbers dynamically route
    // Route::post('/getRoomNo',function(){
    //     if(Request::ajax()){
    //         return Reesponse::json(Request::all());
    //     }
    // });

    // Sohail Test route
    Route::post('/kamehamehaa',function(Request $r){
        $id = $_POST['id'];
        $rooms = \App\Classrooms::where('floor',$id)->select('roomnumber')->get();
         
        return $response;
    });


Route::get('syllabus','examcell@syllabus')->name('examcell.forms.syllabus');
Route::get('getsyllabus/{id}','examcell@getsyllabus');


// HARIS's ROUTES
Route::get('seatno','examcell@seatno')->name('examcell.forms.seatno');
Route::post('seatnolist','seatno@generateseatno');
Route::get('harispractice','harispractice@demo');


// DATA FILLING SCRIPTS
Route::get('filldata','filldata@save');
