<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filldata extends Controller
{
    public function save(){
        // STUDENT ADDING SCRIPTS

        // CO STUDENTS
        $student = new \App\Student();
        $student->firstname = "Bhanushali Neelkumar Premji";
        $student->rollnumber = "13CO19";
        $student->email = "neal.bhanushali@gmail.com";
        $student->contact = "9930219853";
        $student->department = "CO";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Khan Sohail Ahmed Raees Ahmed";
        $student->rollnumber = "14CO28";
        $student->email = "khan.sohail898@gmail.com";
        $student->contact = "7045414593";
        $student->department = "CO";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Shaikh Harris Gulam Rasul";
        $student->rollnumber = "15DCO67";
        $student->email = "compilerharris@gmail.com";
        $student->contact = "9192939493";
        $student->department = "CO";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();
        // CO STUDENT END

        // ME STUDENTS
        $student = new \App\Student();
        $student->firstname = "Bhanushali Neelkumar Premji";
        $student->rollnumber = "13ME19";
        $student->email = "bhanushalineal@gmail.com";
        $student->contact = "9930219855";
        $student->department = "ME";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Khan Sohail Ahmed Raees Ahmed";
        $student->rollnumber = "14ME28";
        $student->email = "sohailkhan898@gmail.com";
        $student->contact = "7045414595";
        $student->department = "ME";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Shaikh Harris Gulam Rasul";
        $student->rollnumber = "15DME67";
        $student->email = "harriscompiler@gmail.com";
        $student->contact = "9192939491";
        $student->department = "ME";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();
        // ME STUDENT END

        // CE STUDENTS
        $student = new \App\Student();
        $student->firstname = "Bhanushali Neelkumar Premji";
        $student->rollnumber = "13CE19";
        $student->email = "nealbhanushali1@gmail.com";
        $student->contact = "9830219855";
        $student->department = "CE";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Khan Sohail Ahmed Raees Ahmed";
        $student->rollnumber = "14CE28";
        $student->email = "sohailkhan899@gmail.com";
        $student->contact = "7145414595";
        $student->department = "CE";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Shaikh Harris Gulam Rasul";
        $student->rollnumber = "15DCE67";
        $student->email = "harriscompilerr@gmail.com";
        $student->contact = "9192939443";
        $student->department = "CE";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();
        // CE STUDENT END

        // EE STUDENTS
        $student = new \App\Student();
        $student->firstname = "Bhanushali Neelkumar Premji";
        $student->rollnumber = "13EE19";
        $student->email = "nealbhanushali2@gmail.com";
        $student->contact = "9880219855";
        $student->department = "EE";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Khan Sohail Ahmed Raees Ahmed";
        $student->rollnumber = "14EE28";
        $student->email = "sohailkhan900@gmail.com";
        $student->contact = "7115414595";
        $student->department = "EE";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Shaikh Harris Gulam Rasul";
        $student->rollnumber = "15DEE67";
        $student->email = "harriscompilerrr@gmail.com";
        $student->contact = "9112939493";
        $student->department = "EE";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();
        // EE STUDENT END

        // EXTC STUDENTS
        $student = new \App\Student();
        $student->firstname = "Bhanushali Neelkumar Premji";
        $student->rollnumber = "13ET19";
        $student->email = "nealbhanushali3@gmail.com";
        $student->contact = "9838219855";
        $student->department = "ET";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Khan Sohail Ahmed Raees Ahmed";
        $student->rollnumber = "14ET28";
        $student->email = "sohailkhan901@gmail.com";
        $student->contact = "7125414595";
        $student->department = "ET";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        
        $student = new \App\Student();
        $student->firstname = "Shaikh Harris Gulam Rasul";
        $student->rollnumber = "15DET67";
        $student->email = "harriscompilerrrr@gmail.com";
        $student->contact = "9191969493";
        $student->department = "ET";
        $student->save();

        $user = new \App\User();
        $user->username = $student->rollnumber;
        $user->email = $student->email;
        $user->type = 'student';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();
        // EXTC STUDENT END

        // STUDENT ADDING SCRIPT ENDS

        // STAFF ADDING SCRIPTS

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


        $staff = new \App\Staff();
        $staff->firstname = "Salmaan";
        $staff->department = "CO";
        $staff->hod = 1;
        $staff->username = "Shamsi";
        $staff->email = "salmanshamsi@gmail.com";
        $staff->contact = "9898989890";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Abrar";
        $staff->department = "ME";
        $staff->hod = 1;
        $staff->username = "abrar";
        $staff->email = "abrar@gmail.com";
        $staff->contact = "9898989098";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Junaid";
        $staff->department = "ME";
        $staff->hod = 1;
        $staff->username = "janaid";
        $staff->email = "junaid@gmail.com";
        $staff->contact = "9898909898";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Hussain";
        $staff->department = "CE";
        $staff->hod = 1;
        $staff->username = "hussain";
        $staff->email = "hussain@gmail.com";
        $staff->contact = "9098989898";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Abhay";
        $staff->department = "CE";
        $staff->hod = 1;
        $staff->username = "abhay";
        $staff->email = "abhay@gmail.com";
        $staff->contact = "8888888888";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Saaniya";
        $staff->department = "EE";
        $staff->hod = 1;
        $staff->username = "Saaniya";
        $staff->email = "Saaniya@gmail.com";
        $staff->contact = "8181818181";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Sneha";
        $staff->department = "EE";
        $staff->hod = 1;
        $staff->username = "Sneha";
        $staff->email = "Sneha@gmail.com";
        $staff->contact = "8282828282";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Shaista";
        $staff->department = "ET";
        $staff->hod = 1;
        $staff->username = "Shaista";
        $staff->email = "Shaista@gmail.com";
        $staff->contact = "8383838383";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Shamiya";
        $staff->department = "ET";
        $staff->hod = 1;
        $staff->username = "Shamiya";
        $staff->email = "Shamiya@gmail.com";
        $staff->contact = "8484848484";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Goku";
        $staff->department = "HAS";
        $staff->hod = 1;
        $staff->username = "Goku";
        $staff->email = "Goku@gmail.com";
        $staff->contact = "8686868686";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();


        $staff = new \App\Staff();
        $staff->firstname = "Bulma";
        $staff->department = "HAS";
        $staff->hod = 1;
        $staff->username = "Bulma";
        $staff->email = "Bulma@gmail.com";
        $staff->contact = "8787878787";
        $staff->save();
        $user = new \App\User();
        $user->username = $staff->username;
        $user->email = $staff->email;
        $user->type = 'staff';
        $user->password = \Hash::make('asdf');
        $user->active = 1;
        $user->save();

        // STAFF ADDING SCRIPTS END

        // EXAM CELL USERS ADDING SCRIPTS

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

        // EXAM CELL USERS ADDING SCRIPTS ENDS

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

        $d = new \App\Department();
        $d->department = "Electrical Engineering";
        $d->dept = "EE";
        $d->years = 4;
        $d->save();

        $d = new \App\Department();
        $d->department = "Civil Engineering";
        $d->dept = "CE";
        $d->years = 4;
        $d->save();

        $d = new \App\Department();
        $d->department = "Electronics and Telecommunications Engineering";
        $d->dept = "EXTC";
        $d->years = 4;
        $d->save();

        $d = new \App\Department();
        $d->department = "Humanities And Applied Sciences";
        $d->dept = "HAS";
        $d->years = 1;
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

        // COMPUTER ENGINEERING EXAMINATIONS
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 1;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 2;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 3;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 4;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 5;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 6;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 7;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CO";
        $examinations->semester = 8;
        $examinations->wef = "2012";
        $examinations->save();
        // COMPUTER ENGINEERING EXAMINATION ENDS
        // CIVIL ENGINEERING EXAMINATIONS

        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 1;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 2;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 3;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 4;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 5;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 6;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 7;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "CE";
        $examinations->semester = 8;
        $examinations->wef = "2012";
        $examinations->save();
        // CIVIL ENGINEERING EXAMINATION ENDS
        // MECHANICAL ENGINEERING EXAMS
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 1;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 2;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 3;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 4;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 5;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 6;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 7;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "ME";
        $examinations->semester = 8;
        $examinations->wef = "2012";
        $examinations->save();
        // MECHANICAL ENGINEERING EXAMINATION ENDS
        
        // ELECTRICAL ENGINEERING EXAMINATIONS
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 1;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 2;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 3;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 4;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 5;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 6;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 7;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EE";
        $examinations->semester = 8;
        $examinations->wef = "2012";
        $examinations->save();
        // ELECTRICAL ENGINEEIRNG EXAMINATION ENDS

        // EXTC EXAMINATIONS
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 1;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 2;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 3;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 4;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 5;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 6;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 7;
        $examinations->wef = "2012";
        $examinations->save();
        
        $examinations = new \App\Examination();
        $examinations->scheme = "CBSGS";
        $examinations->department = "EXTC";
        $examinations->semester = 8;
        $examinations->wef = "2012";
        $examinations->save();
        // EXTC EXAMINATION ENDS
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
    }
}