<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepController;
use App\Http\Controllers\DeanController;
use App\Http\Controllers\PropController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\AuthenticationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $logged_user = session()->get('logged_user');
    $role = session()->get('role');

    if (!$logged_user) {
        return view('layouts.login-signup');
    } else {
        if ($role == 'Dean') {
            return redirect('dean-profile');
        } elseif ($role == 'Student') {
            return redirect('student-profile');
        } elseif ($role == 'Lecturer') {
            return redirect('lecturer-profile');
        } elseif ($role == 'Committee') {
            return redirect('committee-profile');
        } elseif ($role == 'Coordinator') {
            return redirect('coordinator-profile');
        }
    }
})->name('home');

Route::get('/login', function () {
    $logged_user = session()->get('logged_user');
    $role = session()->get('role');

    if (!$logged_user) {
        return view('layouts.login-signup');
    } else {
        if ($role == 'Dean') {
            return redirect('dean-profile');
        } elseif ($role == 'Student') {
            return redirect('student-profile');
        } elseif ($role == 'Lecturer') {
            return redirect('lecturer-profile');
        } elseif ($role == 'Committee') {
            return redirect('committee-profile');
        } elseif ($role == 'Coordinator') {
            return redirect('coordinator-profile');
        }
    }
})->name('login');

Route::get('/home', function () {
    $logged_user = session()->get('logged_user');
    $role = session()->get('role');

    if (!$logged_user) {
        return view('layouts.login-signup');
    } else {
        if ($role == 'Dean') {
            return redirect('dean-profile');
        } elseif ($role == 'Student') {
            return redirect('student-profile');
        } elseif ($role == 'Lecturer') {
            return redirect('lecturer-profile');
        } elseif ($role == 'Committee') {
            return redirect('committee-profile');
        } elseif ($role == 'Coordinator') {
            return redirect('coordinator-profile');
        }
    }
});

// Route::get('/upload', [StudentController::class, 'create']);
// Route::post('/upload', [StudentController::class, 'store']);

Route::view('activities', 'ManageActivities.AddActivities')->name('activities');
Route::view('calendar', 'ManageCalendar.vieweditcalendar')->name('calendar');
Route::view('rep', 'proposalreport.add-report')->name('rep');
Route::view('prop', 'proposalreport.add-proposal')->name('prop');
Route::view('bulletin', 'ManageBulletin.AddBulletin')->name('bulletin');

// VIEW ROUTES
Route::view('register', 'layouts.main');
Route::view('forgot', 'layouts.forgot-password');

// AUTHENTICATION CONTROLLER
Route::post('user_login', [AuthenticationController::class, 'login'])->name('user-login');
Route::post('user_register', [AuthenticationController::class, 'register'])->name('user-register');
Route::post('user_reset', 'AuthenticationController@resetpassword')->name('user-reset');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('user-logout');

// STUDENT CONTROLLER
Route::get('/student-profile', [StudentController::class, 'index']);
Route::post('student_update', [StudentController::class, 'update']);
Route::post('studen_upload', [StudentController::class, 'store']);

// LECTURER CONTROLLER
Route::get('lecturer-profile', [LecturerController::class, 'index']);
Route::post('lecturer_update', [LecturerController::class, 'update']);

// DEAN CONTROLLER
Route::get('dean-profile', [DeanController::class, 'index']);
Route::post('dean_update', [DeanController::class, 'update']);

// COMMITTEE CONTROLLER
Route::get('committee-profile', [CommitteeController::class, 'index']);
Route::post('committee_update', [CommitteeController::class, 'update']);

// COORDINATOR CONTROLLER
Route::get('coordinator-profile', [CoordinatorController::class, 'index']);
Route::post('coordinator_update', [CoordinatorController::class, 'update']);


// Manage Yearly Calendar

Route::get('fullcalender', [FullCalenderController::class, 'index']);
Route::get('viewcalendar', [FullCalenderController::class, 'view']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);


// Manage Proposal & Report

Route::get('prop', [PropController::class, 'index'])->name('prop');
Route::post('proposalreport', [PropController::class, 'create'])->name('proposalreport');
Route::get('cl_edit/{id}','PropController@edit');
Route::get('cl_delete/{id}','PropController@destroy');
Route::post('propup','PropController@edit');

Route::get('rep', [RepController::class, 'index'])->name('rep');
Route::post('proposalreport2', [RepController::class, 'create'])->name('proposalreport2');
Route::get('cli_edit/{id}','RepController@edit');
Route::get('cli_delete/{id}','RepController@destroy');


// Route::get('viewcalendar', [FullCalenderController::class, 'view']);
// Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

// Proposal Routing

//----------Committee Election Routing
//----------

Route::get('election', function () {
    $logged_user = session()->get('logged_user');
    $role = session()->get('role');

    if (!$logged_user) {
        return view('layouts.login-signup');
    } else {
        if ($role == 'Dean') {
            return redirect('dean-profile');
        } elseif ($role == 'Student') {
            return view('electioncommittee.ce-student');
        } elseif ($role == 'Lecturer') {
            return redirect('lecturer-profile');
        } elseif ($role == 'Committee') {
            return view('electioncommittee.ce-committee');
        } elseif ($role == 'Coordinator') {
            return view('electioncommittee.ce-coordinator');
        }
    }
})->name('election');

//Student
Route::view('electionregister', 'electioncommittee.ce-student-register')->name('electionregister');
Route::view('electionvote', 'electioncommittee.ce-student-vote')->name('electionvote');

//Committee
Route::view('electionmanage', 'electioncommittee.ce-committee-election')->name('electionmanage');

//Shared Committee/Coordinator
Route::view('electionmanageregister', 'electioncommittee.ce-manage-registration')->name('electionmanageregister');
Route::view('votingcount', 'electioncommittee.ce-voting-count')->name('votingcount');

//Controllers
Route::post('RegisterNewCandidate', [ElectionController::class, 'RegisterNewCandidate']);
Route::post('ApproveCandidate', [ElectionController::class, 'ApproveNewCandidate']);
Route::post('VoteCandidate', [ElectionController::class, 'RegisterVote']);

Route::controller(ElectionController::class)->group(function(){
    Route::get('electionmanageregistration', 'GetRegisteredCandidate')->name('getpositionlist');
    Route::get('electionvotecandidate', 'GetApprovedCandidate')->name('getcandidates');
    Route::get('changeelectionstatus', 'GetElectionStatus')->name('getstatus');
    Route::get('changeelection', 'SetElectionStatus')->name('changeelection');
    Route::get('electionvotingcount', 'GetVotingCount')->name('getvotingcount');
});

//testing routes
Route::get('/cec', function () {
    return view('electioncommittee/ce-committee');
});

Route::get('/ces', function () {
    return view('electioncommittee/ce-student');
});

Route::get('/cer', function () {
    return view('electioncommittee/ce-student-register');
});

Route::get('/ceo', function () {
    return view('electioncommittee/ce-coordinator');
});

//bulletin
//view bulletin homepage
Route::get('ViewBulletinHomepage', [BulletinController::class, 'viewBulletinHomepage']);
//end view bulletin homepage
Route::get('AddBulletin', [BulletinController::class, 'BulletinInterface']);
Route::get('ViewBulletin', [BulletinController::class, 'viewBulletin']);
Route::post('ManageBulletin', 'BulletinController@addBulletin');
Route::get('click_edit/{bulletinID}','BulletinController@edit_function');
Route::get('click_delete/{bulletinID}','BulletinController@delete');
Route::post('updatebulletin','BulletinController@modify_function');
Route::post('back','BulletinController@back');
//end bulletin


//Activities comittee
Route::get('AddActivities', [ActivitiesController::class, 'ActivitiesInterface']);
Route::get('ViewActivities', [ActivitiesController::class, 'viewActivities']);
Route::post('ManageActivities', 'ActivitiesController@addActivities');
Route::get('c_edit/{activitiesid}','ActivitiesController@edit_function');
Route::get('c_delete/{activitiesid}','ActivitiesController@delete');
Route::post('update','ActivitiesController@modify_function');
//Route::post('back','ActivitiesController@back');
Route::get('Participations', [ActivitiesController::class, 'Participations']);

///////////////////////joinnew student
Route::get('AddJoinActivities', [ActivitiesController::class, 'JoinActivitiesInterface']);
Route::get('ViewJoinActivities', [ActivitiesController::class, 'viewJoinActivities']);
Route::post('ManageActivities2', 'ActivitiesController@addJoinActivities');
Route::get('click_deletecancel/{activitiestittle}','ActivitiesController@deletecancel');
//Activities

//Route::post('backjoin','ActivitiesController@backjoin');



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/testsidebar', function(){
    return view('electioncommittee.test');
});