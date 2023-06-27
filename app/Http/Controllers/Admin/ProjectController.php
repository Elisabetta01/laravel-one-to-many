<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Project;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::All();

        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        /* $request->validate(
        [
            'title'=>'required|unique:projects|max:255'
        ],
        [
           'title.required'=>'Il campo è obbligatorio',
           'title.unique'=>'Il dato è già esistente',
           'title-max'=>'Il campo titolo supera i 255 caratteri' 
        ]);

        $form_data = $request->all();
        */

        $form_data = $request->validated();

        if($request->hasFile('img')){
            $path = Storage::disk('public')->put('project_images', $request->img);

            $form_data['img'] = $path;
        }

        $newProject = new Project();

        $newProject->fill( $form_data );

        $newProject->save();

        return redirect()->route( 'admin.projects.index' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        /* $request->validate(
        [
            'title'=>'required|unique:projects|max:255'
        ],
        [
           'title.required'=>'Il campo è obbligatorio',
           'title.unique'=>'Il dato è già esistente',
           'title-max'=>'Il campo titolo supera i 255 caratteri' 
        ]);

        $form_data = $request->all(); */
        

        $form_data = $request->validated();

        if($request->hasFile('img')){
            $path = Storage::disk('public')->put('project_images', $request->img);

            $form_data['img'] = $path;
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        if($project->img){
            Storage::delete($project->img);
        }

        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
