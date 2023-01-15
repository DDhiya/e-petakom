<?php

namespace App\Http\Controllers;

use App\Models\bulletins as bulletins;
use App\Models\Committee;
use App\Models\Authentication;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use Illuminate\Support\Facades\DB;

class BulletinController extends Controller
{
    //bulletin
    public function BulletinInterface()
    {
        $username = session()->get('logged_user');
        $bulletins = DB::table('bulletins')
            ->get();
        return View('ManageBulletin.addBulletin')->with('bulletins', $bulletins);
    }
    
    function addBulletin(Request $req) // add bulletin
    {
        $bulletinID = $req->input('bulletinID');
        $bulletinImage = $req->input('bulletinImage');
        $title = $req->input('title');
        $description = $req->input('description');
        $bulletins = new bulletins;
        //$bulletins->bulletinImage = $bulletinImage;
        // upload image
        /*$data = $req->all();
        //$fileName = time().$req->file('bulletinImage')->getClientOriginalName();
        $fileName = time();
        //$path = $req->file('bulletinImage')->storeAs('images', $fileName, 'public');
        $path = $bulletinImage->storeAs('images', $fileName, 'public');
        //$data["bulletinImage"] = '/storage/'.$path;
        $data->bulletinImage = '/storage/'.$path;
        bulletins::create($data);
        return redirect('bulletins')->with('flash_message', 'Bulletin Added!'); */

        //  dhiya punya
        //optional
        if($validatedpicture = $req->validate([
            'bulletinImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ])){
            echo "<script type='text/javascript'> window.alert('Upload Successful') </script>";
        }else{
            echo "<script type='text/javascript'> window.alert('Upload Failed') </script>";
        }
        //end optional
        $bulletins->bulletinImage = $req->file('bulletinImage')->store('public/images');
        // end dhiya punya
        // end upload image
        $bulletins->title = $title;
        $bulletins->description = $description;
        $bulletins->save();
        return redirect("ViewBulletin");
    }
    
    function viewBulletin() //view bulletin
    {
        $username = session()->get('logged_user');
        $bulletins = DB::table('bulletins')
            //->where('bulletinID', '=', $bulletinID)
            ->get();
        return View('ManageBulletin.ViewBulletin')->with('bulletins', $bulletins);
         //var_dump($users);
    }

    //view bulletin homepage
    function viewBulletinHomepage() //view bulletin homepage
    {
        $username = session()->get('logged_user');
        $bulletins = DB::table('bulletins')
            ->get();
        return View('ManageBulletin.ViewBulletinHomepage')->with('bulletins', $bulletins);
    }
    //end view bulletin homepage
    
    function edit_function($bulletinID)
    {
        $bulletins = DB::select('select * from bulletins where bulletinID = ?', [$bulletinID]);          
        return view('ManageBulletin.EditBulletin',['bulletins'=>$bulletins]);
    
    }

    function modify_function(Request $req)
    {
        $data=bulletins::find($req->bulletinID);
        $data->bulletinID=$req->bulletinID;
        $data->bulletinImage=$req->bulletinImage;
        $data->title=$req->title;
        $data->description=$req->description;
        $data->save();
        return redirect('ViewBulletin');
    }

    function back()
    {
        return redirect('ViewbulletinV');
    }
    
    function delete($bulletinID)
    {
        $bulletins = DB::delete('delete from bulletins where bulletinID = ?', [$bulletinID]);          
        return redirect('ViewBulletin');
    
    }
    //end bulletin
}
