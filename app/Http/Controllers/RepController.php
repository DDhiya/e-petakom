<?php

namespace App\Http\Controllers;

use App\Models\Rep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rep = DB::table('rep')->get();
        $url = route('rep');
        // return view('index-proposal');
        return view('proposalreport.add-report' ,compact('rep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $Author = $req->input('Author');
        $Title = $req->input('Title');
        $File = $req->input('File');
        $Report = $req->input('Report');
 
        //table meetings
        $reps = new rep;
        //$activitiesses->userID = session()->get('logged_user');
        $reps->Author = $Author;
        $reps->Title = $Title; 
        $reps->File = $File;
        $reps->Report = $Report;
        $reps->save();

        $rep=DB::table('rep')->get();

        return view("proposalreport.view-report", compact('rep'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        rep::create($input);
        return redirect('rep')->with('flash_message', 'Report.Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rep = rep::find($id);
        return view('proposalreport.update-report')->with('proposalreport'.$rep);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rep = DB::select('select * from rep where id = ?', [$id]);          
        return view('proposalreport.update-report',['rep'=>$rep]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rep = rep::find($id);
        $input = $request->all();
        $rep->update($input);
        return redirect('rep')->with('flash_message'. 'Report Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rep = DB::delete('delete from rep where id = ?', [$id]);          
        $rep=DB::table('rep')->get();

        return view("proposalreport.view-report", compact('rep'));
    }
}
