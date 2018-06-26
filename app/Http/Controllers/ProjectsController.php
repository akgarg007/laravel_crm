<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $company_id = NULL)
    {
        // echo $company_id;
        return view('projects.create',['company_id'=>$company_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('company_id'));
        if(Auth::check())
        {
            $project = Project::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'company_id'=>$request->input('company_id'),
                'user_id'=>Auth::user()->id
            ]);

            if($project)
            {
                return redirect()->route('projects.show',['project'=>$project->id])
                    ->with('success','Project created successfully.');
            }
            else{
                return back()->with('errors','Try again');
            }
        }
        else
        {
            return back()->with('error','You are not logged in!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // dd(Comment::all());
        $comments = Comment::where([
            'commentable_type'=>'project',
            'commentable_id'=>$project->id                        
            ])
            ->orderBy('id','desc')
            ->get();
        return view('projects.show',['project'=>$project,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view('projects.edit')->with(['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // echo $project->id;
        if(Auth::check() == Auth::user()->id)
        {
            $project_update = Project::where(['id'=>$project->id])
                                ->update([
                                    'name'=>$request->input('name'),
                                    'description'=>$request->input('description'),
                                ]);

            if($project_update)
            {
                return redirect()->route('projects.show',['project'=>$project->id])->with('success','Success');
            }                    
            else{
                return back()->with('errors','Failed');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project = Project::find($project->id);
        // echo $project->company_id;
        $project_delete = Project::destroy($project->id);
        if($project_delete){
            return redirect()->route('companies.show',['company_id'=>$project->company_id])->with('success','Project deleted successfully.');
        }
        else
        {
            return back()->with('errors','Please try again.');
        }
    }


}
