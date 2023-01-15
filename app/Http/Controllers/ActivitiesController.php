<?php

namespace App\Http\Controllers;
use App\Models\Activities;
use App\Models\JoinActivities;
use App\Models\Committee;
use App\Models\Authentication;
use App\Http\Requests\StoreCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    //comittee
    public function ActivitiesInterface()
    {
        $username = session()->get('logged_user');
        $activities = DB::table('activities')
            ->get();
        return View('ManageActivities.addActivities')->with('activities', $activities);
        // var_dump($comittee);
    }
    

    function addActivities(Request $req) // add activities
    {
        
        $activitiesimage = $req->input('activitiesimage');
        $activitiestittle = $req->input('activitiestittle');
        $quantity = $req->input('quantity');
        $description = $req->input('description');
        $date = $req->input('date');
        $time = $req->input('time');
 
        //table meetings
        $activities = new activities;
        //$activitiesses->userID = session()->get('logged_user');
        $activities->activitiesimage = $activitiesimage;
        $activities->activitiestittle = $activitiestittle; 
        $activities->quantity = $quantity;
        $activities->description = $description;
        $activities->date = $date;
        $activities->time = $time;
        $activities->save();
        return redirect("ViewActivities");

    }

    function viewActivities() //view activities
    {
        $username = session()->get('logged_user');
        $activities = DB::table('activities')
            //->where('activitiesid ', '=', $activitiesid )
            ->get();
        return View('ManageActivities.ViewActivities')->with('activities', $activities);
         //var_dump($users);
    }

    function edit_function($activitiesid)
    {
        $activities = DB::select('select * from activities where activitiesid = ?', [$activitiesid]);          
        return view('ManageActivities.EditActivities',['activities'=>$activities]);
     
    }
  
    function modify_function(Request $req)
    {
        $data=activities::find($req->activitiesid);
        $data->activitiesid=$req->activitiesid;
        $data->activitiesimage=$req->activitiesimage;
        $data->activitiestittle=$req->activitiestittle;
        $data->quantity=$req->quantity;
        $data->description=$req->description;
        $data->date=$req->date;
        $data->time=$req->time;
        $data->save();
        return redirect('ViewActivities');
    }

    function delete($activitiesid)
    {
        $activities = DB::delete('delete from activities where activitiesid = ?', [$activitiesid]);          
        return redirect('ViewActivities');
    
    }

    ////////////////////////////////////////////////////////////////// join student and lect

    public function JoinActivitiesInterface()
    {
        $username = session()->get('logged_user');
        $activities = DB::table('activities')
            ->get();
        return View('ManageActivities.addJoinActivities')->with('activities', $activities);
        // var_dump($comittee);
      
    }
    

    function addJoinActivities(Request $req) // add join activities
    {
        

/////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $matricid = $req->input('matricid');
        $activitiestittle = $req->input('activitiestittle');
        //table 
        $joinactivities = new joinactivities;
        $joinactivities->matricid = $matricid;
        $joinactivities->activitiestittle = $activitiestittle;
        $joinactivities->save();
        return redirect("ViewJoinActivities");

    }

    function participations() //view activities ////////////////////////////////////////////////
    {
        $username = session()->get('logged_user');
        $joinactivities = DB::table('joinactivities')
        ->join('activities', 'joinactivities.activitiestittle', '=', 'activities.activitiestittle')
           
        ->select('joinactivities.activitiestittle as tittle' ,'joinactivities.matricid as id', 'activities.date as date', 'activities.time as time')
        ->get();
        return View('ManageActivities.Participations')->with('joinactivities', $joinactivities);
         //var_dump($users);

    }

    function viewJoinActivities() //view activities //////////////////////////////////////////
    {
        $username = session()->get('logged_user');
        $joinactivities = DB::table('joinactivities')
            //->where('activitiesid ', '=', $activitiesid )
            ->get();
        return View('ManageActivities.ViewJoinActivities')->with('joinactivities', $joinactivities);
         //var_dump($users);
    }


    function deletecancel($activitiestittle)
    {
        $joinactivities = DB::delete('delete from joinactivities where activitiestittle = ?', [$activitiestittle]);           
        return redirect('ViewJoinActivities');
    
    }

}



