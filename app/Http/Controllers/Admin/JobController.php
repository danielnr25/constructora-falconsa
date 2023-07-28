<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.jobs.index', [
            'jobs' => Job::oldest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['slug' => Str::slug($request->slug)]);
        $this->validate(request(), [
            'title' => 'required',
            'subtitle'=>'required',
            'slug' => 'required|unique:jobs',
            'location' => 'required',
            'client' => 'required',
            'year' => 'required|numeric',
            'description' => 'required',
            'imagen' => 'required',
        ]);

        Job::create([
            'title' => request('title'),
            'subtitle' => request('subtitle'),
            'slug' => request('slug'),
            'location' => request('location'),
            'client' => request('client'),
            'year' => request('year'),
            'description' => request('description'),
            'imagen' => request('imagen'),
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Obra creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        return view('includes.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Job $job)
    {
        $request->request->add(['slug' => Str::slug($request->slug)]);
        $this->validate(request(), [
            'title' => 'required',
            'subtitle'=>'required',
            'slug' => ['required', Rule::unique('jobs')->ignore($job->id)],
            'location' => 'required',
            'client' => 'required',
            'year' => 'required|numeric',
            'description' => 'required',
            'imagen' => 'required',
        ]);

        $job->update([
            'title' => request('title'),
            'subtitle' => request('subtitle'),
            'slug' => request('slug'),
            'location' => request('location'),
            'client' => request('client'),
            'year' => request('year'),
            'description' => request('description'),
            'imagen' => request('imagen'),
        ]);


        return redirect()->route('admin.jobs.index')->with('success', 'Obra actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        if ($job->status == 'ACTIVE') {
            $job->update(['status' => 'INACTIVE']);
            return redirect()->route('admin.jobs.index')->with('success', 'obra desactivado correctamente');
        } else {
            $job->update(['status' => 'ACTIVE']);
            return redirect()->route('admin.jobs.index')->with('success', 'obra activado correctamente');
        }
    }

    public function jobs()
    {
        $jobs = Job::where('status', 'ACTIVE')->paginate(6);
        return view('obras', compact('jobs'));

    }


}
