<?php

namespace App\Http\Controllers;
use App\Models\announcements;
use Illuminate\Http\Request;

class announcementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return announcements::all();
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
            'authorID' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        return announcements::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return announcements::find($id);
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
        $announcements = announcements::find($id);
        $announcements->update($request->all());

        return $announcements;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return announcements::destroy($id);
    }

    /**
     * search announcement by type
     *
     * @param  str  $type
     * @return \Illuminate\Http\Response
     */
    public function search($type)
    {
        return announcements::where('type', $type)->get();
    }
}
