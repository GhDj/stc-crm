<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Prospect;
use App\Rdv;
use App\Status;
use Illuminate\Http\Request;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdvs = Rdv::paginate(15);
        return view('rdv.index')->with(['rdvs' => $rdvs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$rdv = Rdv::findOrFail($id);
        $satus = Status::all();
        $status_rdv = Status::findOrFail($rdv->status)->status;
        return view('rdv.show', ['rdv' => $rdv, 'status' => $satus, 'status_rdv' => $status_rdv]);*/
       // dd($id);
        $rdv = Rdv::findOrFail($id);
        $prospect = $rdv->prospect()->first();
       // dd($prospect);
        $status = Status::all();
        return view('prospect.show', [
            'prospect' => $prospect,
            'status' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       $rdv = Rdv::findOrFail($id);
       $rdv->status = $request->get('status');
       $rdv->save();

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
