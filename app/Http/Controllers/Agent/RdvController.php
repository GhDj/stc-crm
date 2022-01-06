<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\RdvStoreRequest;
use App\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rdvs = $user->rdvs()->paginate(10);
        return view('rdv.index')->with(['rdvs' => $rdvs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rdv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RdvStoreRequest $request)
    {
        $data = $request->all();
        unset($data['agent']);
        $data['status'] = "En attente";
        if (!empty($request->get('oppo')))
        {
            $data['rvp'] = $request->get('oppo');
        } elseif (!empty($request->get('selectPj'))) {
            $data['rvp'] = $request->get('selectPj');
        }
        $rdv = Rdv::create($data);
        dd($rdv);
        return redirect(route('agent.prospect.index'));
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
        return view('rdv.show', ['rdv' => $rdv]);*/
        // TODO : rdv show for agents
        return redirect()->back();
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
        //
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
