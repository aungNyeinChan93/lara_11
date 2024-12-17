<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    /**
     * Summary of home
     * @return \Illuminate\Contracts\View\View
     */
    public function home(){
        $jobs = JobPosition::orderBy("created_at","desc")->get();
        return view("test.jobPosition.home",compact('jobs'));
    }

    // show
    public function show($id){
        $job = JobPosition::findOrFail($id);
        return view('test.jobPosition.detail',compact('job'));
    }
}
