<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HireMe;

class HireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hire = HireMe::all()->toArray();
        return view('hire.index', compact('hire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hire.create');
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
            'Skill_Name'    =>  'required',
            'Skill_Description'    =>  'required',
            'Rate'            =>  'required'
        ]);
        $hire = new HireMe([
            'Skill_Name'    =>  $request->get('Skill_Name'),
            'Skill_Description'    =>  $request->get('Skill_Description'),
            'Rate'            =>  $request->get('Rate')
        ]);
        $hire->save();
        return redirect()->route('hire.index')->with('success', 'Skill Added');
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
        $hire = HireMe::find($id);
        return view('hire.edit', compact('hire', 'id'));
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
            
            'Rate'           =>    'required'
        ]);
        $hire = HireMe::find($id);
        $hire->Rate = $request->get('Rate');
        $hire->save();
        return redirect()->route('hire.index')->with('success', 'Education Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hire = HireMe::find($id);
        $hire->delete();
        return redirect()->route('hire.index')->with('success', 'Data Deleted');
    }
}
