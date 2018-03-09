<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    public function register(Request $r) {
        $user = new \App\User();
        
        switch($r->input('registeras')) {
            case 'student':
                $student = new \App\Student();
                $student->firstname = $r->input('firstname');
                $student->rollnumber = $r->input('rollnumber');
                $student->department = $r->input('department');
                $student->email = $r->input('email');
                $student->contact = $r->input('contact');
                $student->save();

                $user->username = $r->input('rollnumber');
                break;
            
            case 'staff':
                $staff = new \App\Staff();
                $staff->firstname = $r->input('firstname');
                $staff->username = $r->input('username');
                $staff->department = $r->input('department');
                $staff->email = $r->input('email');
                $staff->contact = $r->input('contact');
                $staff->save();

                $user->username = $r->input('username');
                break;

            case 'examcell':
                $examcell = new \App\ExamCell();
                $examcell->firstname = $r->input('firstname');
                $examcell->username = $r->input('username');
                $examcell->email = $r->input('email');
                $examcell->contact = $r->input('contact');
                $examcell->save();

                $user->username = $r->input('username');
                break;

            case 'admin':
                $admin = new \App\Admin();
                foreach($r->all() as $key => $value)
                    $admin->$key = $value;
                
                unset($admin->_token);
                unset($admin->username);
                unset($admin->repeatpassword);
                unset($admin->registeras);
                unset($admin->password);
                unset($admin->email);
                unset($admin->contact);

                $admin->username = $admin->rollnumber;
                unset($admin->rollnumber);

                $admin->save();

                $user->username = $admin->username;
                break;
        }

        $user->email = ($r->registeras == 'admin') ? '':$r->email;
        $user->type = $r->registeras;
        $user->password = \Hash::make($r->password);
        if($user->type == 'admin') $user->active = 1;
        $user->save();

        $return['_token'] = csrf_token();
        $return['message'] = 'User Registered successfully';
        return json_encode($return);
    }


    public function login(Request $r) {
        $user = \App\User::find($r->input('username'));
        
        if($user != null) {
            if($user->active) {
                if(\Hash::check($r->password, $user->password)) {
                    $lt = new \App\LoginToken();
                    $lt->token = str_random(69);
                    $lt->username = $user->username;
                    $lt->email = $user->email;
                    $lt->ip = $r->server('REMOTE_ADDR');
                    $lt->ua = $r->server('HTTP_USER_AGENT');
                    $lt->save();
    
                    session([
                        'logintoken' => $lt->token,
                        'username' => $lt->username,
                        'type' => $user->type
                    ]);
    
                    $return['login'] = 1;
                    $return['title'] = 'Success';
                    $return['type'] = 'success';
                    $return['message'] = 'Login successful';
                }
                else {
                    $return['login'] = 0;
                    $return['title'] = 'Alert';
                    $return['type'] = 'error';
                    $return['message'] = 'Invalid Credentials';
                }
            }
            else {
                $return['login'] = 0;
                $return['title'] = 'Info';
                $return['type'] = 'info';
                $return['message'] = 'Please activate your account.';
            }
        }
        else {
            $return['login'] = 0;
            $return['title'] = 'Alert';
            $return['type'] = 'error';
            $return['message'] = 'Invalid Credentials';
        }

        $return['_token'] = csrf_token();
        return json_encode($return);
    }


    public function forgotpassword(Request $r) {
        $user = \App\User::find($r->input('username'));
        
        if($user != null) {
            if($user->active) {
                $pr = new \App\PasswordReset();
                $pr->username = $user->username;
                $pr->email = $user->email;
                $pr->token = str_random(69);
                while(\App\PasswordReset::where('token', $pr->token)->where('active', 1)->first() != null)
                    $pr->token = str_random(69);
                
                // do the mailing job
                $pr->save();

                session([
                    'messagetype' => 'success',
                    'icon' => 'check',
                    'message' => 'Password reset instructions have been sent to your registered Email ID.'
                    ]);
                
                return back();
            }
            else {
                session([
                    'messagetype' => 'info',
                    'icon' => 'info',
                    'message' => 'Please activate your account.'
                    ]);
                
                return back();
            }
        }
        else {
            session([
                'messagetype' => 'danger',
                'icon' => 'ban',
                'message' => 'Invalid user.'
                ]);
            
            return back();
        }
    }


    public function resetpasswordform($username, $token) {
        if(session()->has('logintoken'))
            return redirect()->route('dashboard');
        
        $tuple = \App\PasswordReset::where('username', $username)->where('token', $token)->where('active', 1)->first();
        if($tuple != null) {
            session([
                'messagetype' => 'success',
                'icon' => 'check',
                'username' => $username,
                'token' => $token
                ]);
        }
        else {
            session([
                'messagetype' => 'danger',
                'icon' => 'ban',
                'message' => 'Invalid Token'
                ]);
        }

        return view('auth.resetpassword');
    }

    public function resetpassword(Request $r, $username, $token) {
        $tuple = \App\PasswordReset::where('username', $username)->where('token', $token)->where('active', 1)->first();
        if($tuple != null) {
            $user = \App\User::find($r->username);

            if($user != null) {
                \DB::table('password_resets')
                ->where('username', $username)
                ->where('token', $token)
                ->where('email', $user->email)
                ->where('active', 1)
                ->update([
                    'active' => 0,
                    'updated_at' => now()
                ]);


                $user->password = \Hash::make($r->password);
                $user->save();

                //do the mail thing

                session([
                    'messagetype' => 'success',
                    'icon' => 'check',
                    'message' => 'Your password was successfully reset. You can log in with the new password.'
                    ]);

                return redirect()->route('login');
            }

            
        }
    }

    public function logout() {
        \DB::table('login_tokens')
                ->where('username', session()->get('username'))
                ->where('token', session()->get('logintoken'))
                ->where('active', 1)
                ->update([
                    'active' => 0,
                    'updated_at' => now()
                ]);

        session()->forget(['username', 'logintoken', 'type']);

        return redirect()->route('login');
    }

    public function dashboard() {
        // dd(session()->all());

        if(!session()->has('logintoken'))
            return redirect()->route('login');

        if(session()->get('type') == 'student')
            $user = \App\Student::find(session()->get('username'));
        if(session()->get('type') == 'staff')
            $user = \App\Staff::find(session()->get('username'));
        if(session()->get('type') == 'examcell')
            $user = \App\ExamCell::find(session()->get('username'));
        if(session()->get('type') == 'admin')
            $user = \App\Admin::find(session()->get('username'));

        // dd($user);

        return view('dashboard')->with(compact('user'));
    }

    public function profile() {
        if(session()->get('type') == 'student')
            $user = \App\Student::find(session()->get('username'));
        if(session()->get('type') == 'staff')
            $user = \App\Staff::find(session()->get('username'));
        if(session()->get('type') == 'examcell')
            $user = \App\ExamCell::find(session()->get('username'));
        if(session()->get('type') == 'admin')
            $user = \App\Admin::find(session()->get('username'));

        return view('profile')->with(compact('user'));
    }
}
