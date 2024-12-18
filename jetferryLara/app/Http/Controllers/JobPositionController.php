<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobPositionController extends Controller
{
    /**
     * Summary of home
     * @return \Illuminate\Contracts\View\View
     */
    public function home(){
        $jobs = JobPosition::with(['employer','tags'])->orderBy("created_at","desc")->paginate(5);
        return view("test.jobPosition.home",compact('jobs'));
    }

    /**
     * Summary of show
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id){
        $job = JobPosition::findOrFail($id);
        return view('test.jobPosition.detail',compact('job'));
    }

    /**
     * Summary of createPage
     * @return \Illuminate\Contracts\View\View
     */
    public function createPage(){
        $employers = Employer::get();
        return view('test.jobPosition.createPage',compact('employers'));
    }


    /**
     * Summary of create
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request){

        $fields = $request->validate([
            'title'=>['required'],
            'salary'=>['required'],
            'employer_id'=>['required'],
        ]);

        JobPosition::create($fields);

        // Alert::success('Success Title', 'Success Message');

        return to_route('jobPosition.home')->with('create-job',"Job Create Success ! ");
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        JobPosition::find($id)->delete();
        // Alert::success('Success ', 'Delete Success');
        return to_route('jobPosition.home')->with("delete-job","Job Delete Success !");
    }

    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id){
        $employers = Employer::get();
        $job = JobPosition::findOrFail($id);
        return view('test.jobPosition.edit',compact(['employers','job']));
    }

    /**
     * Summary of update
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id){
        $fields = request()->validate([
            'title'=>['required'],
            'salary'=>['required'],
            'employer_id'=>['required'],
        ]);

        $job = JobPosition::findOrFail($id);

        $job->update($fields);

        return to_route('jobPosition.home')->with('update-job',"Job update Success ! ");

    }
}
