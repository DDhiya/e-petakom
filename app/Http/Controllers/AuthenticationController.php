<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Lecturer as Lecturer;
use App\Models\committee as committee;
use Illuminate\Support\Facades\Session;
use App\Models\Authentication as Authentication;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        //Validator

        $messages = [
            'username' => 'Username is required',
            'password' => 'Password is required',
        ];

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $validated_data = $request->validate($rules, $messages);

        $data = $request->input();

        //SELECT ELOQUENT
        $check = Authentication::where('username', $request->username)->exists();

        if ($check) {
            $Authentication = Authentication::where('username', $request->username)
                ->get()
                ->first();

            $role = $Authentication->role;
            $username = $Authentication->username;
            $password = $Authentication->password;

            if ($password == $data['password']) {
                // Save into session
                Session::put('role', $role);
                Session::put('logged_user', $username); //put the data and in session

                return redirect('home');

            } else {
                // custom back validator message
                $custom_msg = [
                    'password' => 'Wrong password entered',
                ];

                // return back with custom error message
                return redirect()->back()->withInput()->withErrors($custom_msg);
            }
        } else {
            // custom back validator message
            $custom_msg = [
                'username' => 'Username does not exist',
            ];

            // return back with custom error message
            return redirect()->back()->withInput()->withErrors($custom_msg);
        }

        // return $check
    }

    public function register(Request $request)
    {
        // Validator

        // $messages = [
        //     'username' => 'Username is required',
        //     'password' => 'Password is required',
        //     'role' => 'Role is required',
        // ];

        // $rules = [
        //     'username' => 'required',
        //     'password' => 'required',
        //     'role' => 'required',
        //     'name' => 'required',
        //     'email' => 'required','email:rfc,dns,spoof',
        //     'phone' => 'required | email',
        // ];

        // $validated_data = $request->validate($rules, $messages);

        $data = $request->input();

        $username = $request->username;
        $Authentication = new Authentication;
        $currentdt = date('d-m-Y H:i:s');

        //Insert

        // $Authentication->name = $request->name;
        // $Authentication->email = $request->email;
        // $Authentication->phone = $request->phone;
        // $Authentication->created_at = $currentdt;
        // $Authentication->updated_at = $currentdt;

        //SELECT ELOQUENT
        $check = Authentication::where('username', $request->username)->exists();

        if ($check) {
            // custom back validator message
            $custom_msg = [
                'username' => 'Username already exist',
            ];

            // return back with custom error message
            return redirect()->back()->withInput()->withErrors($custom_msg);

            // } elseif ($request->role == 'Dean') {
            //     $dean = new Dean;
            //     $dean->username = $username;
            //     // DECLARE VARIABLE FROM THE INPUT REQUEST
            //     $dean_first_name = $request->name;
            //     $dean_email = $request->email;
            //     $dean_mobile_no = $request->phone;
            //     // SAVE THE VARIABLE INTO THE DATABASE
            //     $dean->dean_first_name = $dean_first_name;
            //     $dean->dean_email = $dean_email;
            //     $dean->dean_mobile_no = $dean_mobile_no;
            //     $dean->save();
            //     return redirect('login');

        } elseif ($request->role == 'Student') {
            $Authentication->username = $request->username;
            $Authentication->password = $request->password;
            $Authentication->role = $request->role;
            $result = $Authentication->save();
            $role = $Authentication->role;
            // SAVE THE VARIABLE INTO THE DATABASE
            $student = new Student;
            $student->username = $username;
            $student->student_email = $request->email;
            $student->student_mobile_no = $request->phone;
            $student->save();
            return redirect('login');

        } elseif ($request->role == 'Lecturer') {
            $Authentication->username = $request->username;
            $Authentication->password = $request->password;
            $Authentication->role = $request->role;
            $result = $Authentication->save();
            $role = $Authentication->role;
            // SAVE THE VARIABLE INTO THE DATABASE
            $lecturer = new Lecturer;
            $lecturer->username = $username;
            $lecturer->lecturer_email = $request->email;
            $lecturer->lecturer_mobile_no = $request->phone;
            $lecturer->save();
            return redirect('login');

            // } elseif ($request->role == 'Coordinator') {
            //     $coordinator = new Coordinator;
            //     $coordinator->username = $username;
            //     // DECLARE VARIABLE FROM THE INPUT REQUEST
            //     $coordinator_first_name = $request->name;
            //     $coordinator_email = $request->email;
            //     $coordinator_mobile_no = $request->phone;
            //     // SAVE THE VARIABLE INTO THE DATABASE
            //     $coordinator->coordinator_first_name = $coordinator_first_name;
            //     $coordinator->email = $coordinator_email;
            //     $coordinator->phone = $coordinator_mobile_no;
            //     $coordinator->save();
            //     return redirect('login');

        } elseif ($request->role == 'Committee') {
            $Authentication->username = $request->username;
            $Authentication->password = $request->password;
            $Authentication->role = $request->role;
            $result = $Authentication->save();
            $role = $Authentication->role;
            // SAVE THE VARIABLE INTO THE DATABASE
            $committee = new Committee;
            $committee->username = $username;
            $committee->committee_email = $request->email;
            $committee->committee_mobile_no = $request->phone;
            $committee->save();
            return redirect('login');
        }

    }

    public function reset_pass(Request $request)
    {

        // validation
        $messages = [
            'required' => 'required',
            'between' => 'must :min - :max letter',
            'min' => 'minimum :min letter',
            'confirmed' => 'Password did not match',
        ];

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $validated_data = $request->validate($rules, $messages);

        $data = $request->input();

        // SELECT ELOQUENT
        $check = Authentication::where('username', $request->username)->exists();

        if ($check) {
            $Authentication = Authentication::where('username', $request->username)->get()->first();
            $Authentication->password = $request->password;
            $Authentication->save();

            $custom_msg = [
                'success' => 'Password successfully changed',
            ];

            return redirect()->back()->withInput()->withErrors($custom_msg);

        } else {
            // custom back validator message
            $custom_msg = [
                'username' => 'Username does not exist',
            ];

            // return back with custom error message
            return redirect()->back()->withInput()->withErrors($custom_msg);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login');
    }
}
