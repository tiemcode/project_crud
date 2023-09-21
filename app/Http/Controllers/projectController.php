<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Support\Facades\Redirect;

class projectController extends Controller
{
    public function home()
    {
        return view('home.projects');
    }
    public function index()
    {
        $project = projects::orderBy('created_at', 'desc')->paginate(6);
        return view('projects.dashboard', compact('project'));
    }

    public function edit($id)
    {
        if (projects::find($id, '*') == false) {
            return Redirect::route('addPost');
        }
        $data = projects::where('id', $id)->first();
        return view('articales.edit', compact('data'));
    }
    public function update()
    {
        // dit is de post van edit
    }
    public function add()
    {
        
    }
    public function delete($id)
    {
        projects::where('id', $id)->delete();
        return redirect::route('projects.index');
    }
}
