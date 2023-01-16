<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use App\Models\Authentication;
use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommitteeController extends Controller
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
            ->Join('committees', 'authentications.username', '=', 'committees.username')
            ->where('authentications.username', '=', $username)
            ->get();
        return View('ManageProfile.profile-committee')->with('committees', $authentication);
        //var_dump($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $username = $request->input('matric-id');
        $password = $request->input('password');
        $committee_first_name = $request->input('committee_first_name');
        $committee_last_name = $request->input('committee_last_name');
        $committee_email = $request->input('committee_email');
        $committee_mobile_no = $request->input('committee_mobile_no');
        $committee_address = $request->input('committee_address');
        $committee_city = $request->input('committee_city');
        $committee_country = $request->input('committee_country');
        $committee_state = $request->input('committee_state');
        $committee_zipcode = $request->input('committee_zipcode');
        $committee_course = $request->input('committee_course');
        $committee_year = $request->input('committee_year');
        $committee_semester = $request->input('committee_semester');
        $committee_portfolio = $request->input('committee_portfolio');
        $committee_position = $request->input('committee_position');

        //table authentications
        $authentications = Authentication::where('username', '=', session()->get('logged_user'))->get()->first();
        $authentications->username = $username;
        $authentications->password = $password;
        $authentications->save();

        //table committees
        $committees = Committee::where('username', '=', session()->get('logged_user'))->get()->first();
        // $check = committee::where('committee_picture', Storage::get($profile_picture))->exists();
        // $exists = Storage::disk('local')->exists($committees->committee_picture);
        if ($request->hasFile('image')) {
            $logoImage = $request->file('image');
            $name = $logoImage->getClientOriginalName();
            $size = $logoImage->getSize();
        }
        $request->file('image')->storeAs('public/images/', $name);
        $committees->username = $username;
        $committees->committee_first_name = $committee_first_name;
        $committees->committee_last_name = $committee_last_name;
        $committees->committee_email = $committee_email;
        $committees->committee_mobile_no = $committee_mobile_no;
        $committees->committee_address = $committee_address;
        $committees->committee_city = $committee_city;
        $committees->committee_state = $committee_state;
        $committees->committee_zipcode = $committee_zipcode;
        $committees->committee_country = $committee_country;
        $committees->committee_course = $committee_course;
        $committees->committee_year = $committee_year;
        $committees->committee_semester = $committee_semester;
        $committees->committee_picture = $name;
        $committees->committee_picture_size = $size;
        $committees->committee_portfolio = $committee_portfolio;
        $committees->committee_position = $committee_position;
        Session::put('logged_user', $username);
        $committees->save();
        return redirect("committee-profile");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommitteeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    // public function edit()
    // {
    //     $username = session()->get('logged_user');
    //     $authentications = DB::table('authentications')
    //         ->Join('committees', 'authentications.username', '=', 'committees.username')
    //         ->where('users.username', '=', $username)
    //         ->get();
    //     return View('ManageProfile.edit-profile-committee')->with('committees', $authentications);
    //     // var_dump($committees);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommitteeRequest  $request
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        //
    }
}
