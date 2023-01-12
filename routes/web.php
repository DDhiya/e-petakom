<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeanController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ElectionController;

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

Route::view('activities', 'ManageProfile.profile-student')->name('activities');
Route::view('calendar', 'ManageCalendar.fullcalender')->name('calendar');
Route::view('report', 'ManageProfile.profile-student')->name('report');
Route::view('proposal', 'ManageProfile.profile-student')->name('proposal');
Route::view('election', 'electioncommittee.ce-student')->name('election');
Route::view('bulletin', 'ManageProfile.profile-student')->name('bulletin');

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
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

//----------Committee Election Routing
//----------

//Student
Route::view('electionregister', 'electioncommittee.ce-student-register')->name('electionregister');
Route::view('electionvote', 'electioncommittee.ce-student-vote')->name('electionvote');

//Committee
Route::view('electionmanage', 'electioncommittee.ce-committee-election')->name('electionmanage');

//Shared Committee/Coordinator
Route::view('electionmanageregister', 'electioncommittee.ce-manage-registration')->name('electionmanageregister');
Route::view('votingcount', 'electioncommittee.ce-voting-count')->name('votingcount');

Route::post('RegisterNewCandidate', [ElectionController::class, 'RegisterNewCandidate']);

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
