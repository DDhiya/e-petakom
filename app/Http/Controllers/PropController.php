<?php

namespace App\Http\Controllers;
use App\Models\prop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prop = DB::table('prop')->get();
        $url = route('prop');
        // return view('index-proposal');
        return view('proposalreport.add-proposal' ,compact('prop'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $Author = $req->input('Author');
        $MatricID = $req->input('MatricID');
        $Title = $req->input('Title');
        $File = $req->input('File');
 
        //table meetings
        $props = new prop;
        //$activitiesses->userID = session()->get('logged_user');
        $props->Author = $Author;
        $props->MatricID = $MatricID; 
        $props->Title = $Title;
        $props->File = $File;
        $props->save();

        $prop=DB::table('prop')->get();

        return view("proposalreport.view-proposal", compact('prop'));
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
        prop::create($input);
        return redirect('prop')->with('flash_message', 'Proposal.Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prop = prop::find($id);
        return view('proposalreport.update-proposal')->with('proposalreport'.$prop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $prop = DB::select('select * from prop where id = ?', [$request->id]);          
        return view('proposalreport.update-proposal', compact('prop'));
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
        $prop = prop::find($id);
        $input = $request->all();
        $prop->update($input);
        return redirect('prop')->with('flash_message'. 'Proposal Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prop = DB::delete('delete from prop where id = ?', [$id]);          
        $prop=DB::table('prop')->get();

        return view("proposalreport.view-proposal", compact('prop'));
    }
}
