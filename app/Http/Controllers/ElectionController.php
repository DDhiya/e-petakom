<?php

namespace App\Http\Controllers;

use App\Models\ApprovedCandidate;
use App\Models\ApprovedCandidateModel;
use App\Models\Election;
use App\Models\RegisteredCandidate;
use App\Models\RegisteredCandidateModel;
use Error;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use PHPUnit\Util\Xml\Exception;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    public function RegisterNewCandidate(Request $request)
    {
        $registered = new RegisteredCandidate();
        $registered->matricid = $request->input('studentmatricid');
        $registered->name = $request->input('studentname');
        $registered->position = $request->input('studentposition');
        $registered->manifesto = $request->input('studentmanifesto');

        if($validatedpicture = $request->validate([
            'candidateprofileimage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ])){
            echo "<script type='text/javascript'> window.alert('Upload Successful') </script>";
        }else{
            echo "<script type='text/javascript'> window.alert('Upload Failed') </script>";
        }

        $registered->profilepicture = $request->file('candidateprofileimage')->
            store('public/images');

        $matricidmajor = substr($registered->matricid, 0, 2);

        if ($matricidmajor == 'CB' || $matricidmajor == 'cb' || $matricidmajor == 'Cb'){
            $registered->major = 'BCS';
        }
        else if ($matricidmajor == 'CD' || $matricidmajor == 'cd' || $matricidmajor == 'Cd'){
            $registered->major = 'BCG';
        }
        else if ($matricidmajor == 'CA' || $matricidmajor == 'ca' || $matricidmajor == 'Ca'){
            $registered->major = 'BCN';
        }
        else if ($matricidmajor == 'CC' || $matricidmajor == 'cc' || $matricidmajor == 'Cc'){
            $registered->major = 'DCS';
        }

        $matricidintake = substr($registered->matricid, 2, 2);

        if ($matricidintake == '16' || $matricidintake == '17' || $matricidintake == '18'){
            $registered->intake = 'Year 5';
        }
        else if ($matricidintake == '19'){
            $registered->intake = 'Year 4';
        }
        else if ($matricidintake == '20'){
            $registered->intake = 'Year 3';
        }
        else if ($matricidintake == '21'){
            $registered->intake = 'Year 2';
        }
        else if ($matricidintake == '22'){
            $registered->intake = 'Year 1';
        }
        // $registered->major = $request->major;
        // $registered->intake = $request->intake;

        if ($registered->save())
            return view('electioncommittee/ce-student');
    }

    public function GetRegisteredCandidate()
    {
        $highcouncillist=DB::table('registered_candidates')
                                ->where('position', '=', 'Majlis Tertinggi')
                                ->get();

        $publicitylist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Hebahan & Publisiti')
                                ->get();

        $logisticlist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Keusahawanan & Logistik')
                                ->get();

        $sportslist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Sukan & Rekreasi')
                                ->get();
        
        $relationslist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Komuniti Luar & Hubungan Antarabangsa')
                                ->get();

        $multimedialist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Multimedia')
                                ->get();
                                
        $welfarelist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Sahsiah & Kebajikan')
                                ->get();

        $academiclist=DB::table('registered_candidates')
                                ->where('position', '=', 'Portfolio Akademik & Kerjaya')
                                ->get();
        // dd($highcouncillist);
        return view('electioncommittee.ce-manage-registration', compact('highcouncillist', 
                                                                        'publicitylist', 
                                                                        'logisticlist',
                                                                        'sportslist',
                                                                        'relationslist',
                                                                        'multimedialist',
                                                                        'welfarelist',
                                                                        'academiclist'));
    }

    public function ApproveNewCandidate(Request $request)
    {
        $data = $request->input('action');
        // dd($request->selectcandidate);
        //dd($data);
        // dd($request->input('selectcandidate'));
        switch ($data) {
            case 'Approve':
                //approve, put into database
                //remove from registeredcandidate database
                foreach ($request->input('selectcandidate') as $student) {
                    RegisteredCandidate::query()
                        ->where('matricid', '=', $student)
                        ->each(function ($oldRecord) {
                            $newRecord = $oldRecord->replicate();
                            $newRecord->setTable('approved_candidates');
                            $newRecord->save();
                            $oldRecord->delete();
                        });
                }
                break;
            
            case 'Reject':
                //remove from registeredcandidate database
                RegisteredCandidate::query()
                    ->where('matricid','=', $request->input('selectcandidate'))
                    ->each(function ($oldRecord) {
                        $oldRecord->delete();
                    });
                break;
        }

        return to_route('getpositionlist');
    }

    public function DestroyCandidate($matricid)
    {
        if($matricid->delete())
            return true;
    }

    public function GetElectionStatus()
    {
        //query last row of status column value
        $electionstatus = new Election();
        return $electionstatus;
    }

    public function SetElectionStatus($electionstatus)
    {
        $election = new Election();
        if ($electionstatus == 'OFF')
        {
            $election->starttime = \Carbon\Carbon::now()->timestamp;
            $election->electionstatus = 'ON';
        }
        else if ($electionstatus == 'ON')
        {
            $election->endtime = \Carbon\Carbon::now()->timestamp;
            $election->electionstatus = 'OFF';
        }
        else
            throw new Exception("Election Status is not set properly");
    }

    public function GetApprovedCandidate()
    {
        $approvedcandidate = ApprovedCandidate::all();
        return $approvedcandidate;
        //use view?
    }

    public function RegisterVote(Request $request)
    {
        /*FOR each row in req

            ApprovedCandidate->matricid = req->matricid

            votes = get() votecount value

            votes = votes  + 1

            votecount = votes

            votecount->save()
         */

    }

    public function GetVotingCount()
    {
        $votingcount = ApprovedCandidate::all();
        return $votingcount;
    }

    public function ExportVotingCountPDF()
    {
        
    }

    public function ExportVotingCountJPG()
    {
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
