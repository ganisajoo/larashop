<?php

namespace App\Http\Controllers;

use App\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permits = Permit::paginate(10);
        return view('permits.index', ['permits' => $permits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_permit = new Permit();
        $new_permit->nama_permit = $request->get('nama_permit');
        $new_permit->purpose = $request->get('purpose');
        $new_permit->tipe_akses = $request->get('tipe_akses');
        $new_permit->time_akses = $request->get('time_akses');
        $new_permit->area = json_encode($request->get('area'));
        $new_permit->testing = $request->get('testing');
        $new_permit->rollback = $request->get('rollback');
        $new_permit->created_by = Auth::user()->id;
        $new_permit->updated_by = Auth::user()->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function show(Permit $permit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function edit(Permit $permit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permit $permit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permit $permit)
    {
        //
    }
}
