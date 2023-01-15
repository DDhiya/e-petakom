<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Authentication;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = session()->get('logged_user');
        $authentication = DB::table('authentications')
            ->Join('students', 'authentications.username', '=', 'students.username')
            ->where('authentications.username', '=', $username)
            ->get();
        return View('ManageProfile.profile-student')->with('students', $authentication);
        //var_dump($users);
        //dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $student_first_name = $request->input('student_first_name');
        $student_last_name = $request->input('student_last_name');
        $student_email = $request->input('student_email');
        $student_mobile_no = $request->input('student_mobile_no');
        $student_address = $request->input('student_address');
        $student_city = $request->input('student_city');
        $student_country = $request->input('student_country');
        $student_state = $request->input('student_state');
        $student_zipcode = $request->input('student_zipcode');
        $student_course = $request->input('student_course');
        $student_year = $request->input('student_year');
        $student_semester = $request->input('student_semester');
        $student_picture = $request->input('student_picture');
        
        //table authentications
        $authentications = Authentication::where('username', '=', session()->get('logged_user'))->get()->first();
        $authentications->username = $username;
        $authentications->password = $password;
        $authentications->save();
        
        //table students
        $students = Student::where('username', '=', session()->get('logged_user'))->get()->first();
        $students->username = $username;
        $students->student_first_name = $student_first_name;
        $students->student_last_name = $student_last_name;
        $students->student_email = $student_email;
        $students->student_mobile_no = $student_mobile_no;
        $students->student_address = $student_address;
        $students->student_city = $student_city;
        $students->student_country = $student_country;
        $students->student_state = $student_state;
        $students->student_zipcode = $student_zipcode;
        $students->student_course = $student_course;
        $students->student_year = $student_year;
        $students->student_semester = $student_semester;
        $students->student_picture = $student_picture;
        $students->save();
        return redirect("student-profile");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function edit()
    // {
    //     $username = session()->get('logged_user');
    //     $authentications = DB::table('authentications')
    //         ->Join('students', 'authentications.username', '=', 'students.username')
    //         ->where('users.userID', '=', $username)
    //         ->get();
    //     return View('ManageProfile.edit-profile-student')->with('students', $authentications);
    //     // var_dump($students);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
