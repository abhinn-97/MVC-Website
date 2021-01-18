<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Educations;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Educations::all()->toArray();
        return view('education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Degree_Name'    =>  'required',
            'School_Name'    =>  'required',
            'GPA'            =>  'required'
        ]);
        $educations = new Educations([
            'Degree_Name'    =>  $request->get('Degree_Name'),
            'School_Name'    =>  $request->get('School_Name'),
            'GPA'            =>  $request->get('GPA')
        ]);
        $educations->save();
        return redirect()->route('education.index')->with('success', 'Education Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educations = Educations::find($id);
        return view('education.edit', compact('educations', 'id'));
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
        $this->validate($request, [
            
            'GPA'           =>    'required'
        ]);
        $educations = Educations::find($id);
        $educations->GPA = $request->get('GPA');
        $educations->save();
        return redirect()->route('education.index')->with('success', 'Education Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educations = Educations::find($id);
        $educations->delete();
        return redirect()->route('education.index')->with('success', 'Data Deleted');
    }
}
