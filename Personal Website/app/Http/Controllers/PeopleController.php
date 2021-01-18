<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::all()->toArray();
        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
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
            'fname'    =>  'required',
            'lname'    =>  'required',
            'uname'    =>  'required',
            'email'    =>  'required|email',
            'pass'     =>  'required|min:3'
        ]);
        $people = new People([
            'fname'    =>  $request->get('fname'),
            'lname'    =>  $request->get('lname'),
            'uname'    =>  $request->get('uname'),
            'email'    =>  $request->get('email'),
            'pass'     =>  $request->get('pass')
        ]);
        $people->save();
        return redirect()->route('people.index')->with('success', 'Data Added');
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
        $people = People::find($id);
        return view('people.edit', compact('people', 'id'));
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
            'fname'    =>  'required',
            'lname'    =>  'required'
        ]);
        $people = People::find($id);
        $people->fname = $request->get('fname');
        $people->lname = $request->get('lname');
        $people->save();
        return redirect()->route('people.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id);
        $people->delete();
        return redirect()->route('people.index')->with('success', 'Data Deleted');
    }
}
