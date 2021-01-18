<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Work::all()->toArray();
        return view('work.index', compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work.create');
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
            'Company_Name'    =>  'required',
            'Position'    =>  'required',
            'Time'    =>  'required',
        ]);
        $work = new Work([
            'Company_Name'    =>  $request->get('Company_Name'),
            'Position'    =>  $request->get('Position'),
            'Time'    =>  $request->get('Time'),
        ]);
        $work->save();
        return redirect()->route('work.index')->with('success', 'Work Added');
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
        $work = Work::find($id);
        return view('work.edit', compact('work', 'id'));
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
            'Time'          => 'required'
        ]);
        $work = Work::find($id);
        $work->Time = $request->get('Time');
        $work->save();
        return redirect()->route('work.index')->with('success', 'Work Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
        $work->delete();
        return redirect()->route('work.index')->with('success', 'Work Deleted');    
    }
}
