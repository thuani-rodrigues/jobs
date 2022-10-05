<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $job = Job::all();

        return view('jobs.index', [
            'jobs' => $job,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create',[
            'companies'=> Company::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $payload = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_id' => 'required',   
        ]);

        $job = new Job();
        $job->fill($payload);

        $company = Company::find($payload['company_id']);

        $company->jobs()->save($job);
        
        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return $job;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Job $job)
    {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job )
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            
        ]);
         
        $job->fill($data);
        $job->save();

        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Job $job):RedirectResponse
    {
        $job->delete();

        return redirect()->route('jobs.index');
    }
}
