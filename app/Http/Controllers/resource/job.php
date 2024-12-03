<?php

namespace App\Http\Controllers\resource;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job as jobs;
use Carbon\Carbon;

class job extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;

        if ($userRole === 'Student') {
            $jobs = Jobs::with('user')->orderBy('job_title')->get();
        } else {
            $jobs = Jobs::with('user')->where('user_id', $userId)->orderBy('job_title')->get();
        }
        return view('job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'job_date' => 'required|date',
            'description' => 'required',
            'job_location' => 'required',
            'salary' => 'required',
            'criteria' => 'required',
            'user_id' => 'required|exists:users,id',
            'name.*' => 'string',
            ]);
                
            try {
                $jobs = new jobs();
                $jobs->user_id = $request->user_id;
                $jobs->job_title = $request->job_title; 
                $jobs->submission_date = $request->job_date; 
                $jobs->job_description = $request->description; 
                $jobs->job_location = $request->job_location; 
                $jobs->criteria = $request->criteria; 
                $jobs->salary = $request->salary; 
                $jobs->skill = json_encode($request->name);

                $jobs->save();
        
                return redirect()->route('job.index')->with('success', 'Job Created Successfully');
            } catch (\Exception $e) {
                // Log the exception message
                dd($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Jobs::with('user')->find($id);
        return view('job.show', compact('job')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobs = jobs::find($id);
        return view('job.edit',compact('jobs'));
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
        $request->validate([
            'job_title' => 'required',
            'job_date' => 'required|date',
            'description' => 'required',
            'job_location' => 'required',
            'salary' => 'required',
            'criteria' => 'required',
            'user_id' => 'required|exists:users,id',
            'name.*' => 'string',
            ]);
                
            try {
                $jobs = jobs::findOrFail($id);
                $jobs->user_id = $request->user_id;
                $jobs->job_title = $request->job_title; 
                $jobs->submission_date = $request->job_date; 
                $jobs->job_description = $request->description; 
                $jobs->job_location = $request->job_location; 
                $jobs->criteria = $request->criteria; 
                $jobs->salary = $request->salary; 
                $jobs->skill = json_encode($request->name);

                $jobs->save();
        
                return redirect()->route('job.index')->with('success', 'Job Updated Successfully');
            } catch (\Exception $e) {
                // Log the exception message
                dd($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
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

    public function deleteJob(Request $request)
    {

        $job = jobs::findOrFail($request->input('id'));
        if (!$job) {
        return response()->json(['error' => 'Job not found.'], 404);
        }

       
        $job->forceDelete(); 
        return response()->json(['success' => 'The job has been deleted!']);
    
    }
}
