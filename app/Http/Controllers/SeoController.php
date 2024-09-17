<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeoRequest;
use App\Models\Seo;
use App\Models\Service;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seos = Seo::latest()->get();
        return view('seos.index', compact('seos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::all();
        return view('seos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeoRequest $request)
    {
        //
        $input = $request->all();

        Seo::create($input);

        session()->flash('success', 'تم اضافة سيو بنجاح');

        return redirect()->route('seos.index');
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
    public function edit(Seo $seo)
    {
        //
        return view('seos.create', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeoRequest $request, Seo $seo)
    {
        //
        //
        $input = $request->all();

        $seo->update($input);
        session()->flash('success', 'تم تحديث السيو بنجاح');

        return redirect()->route('seos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo $seo)
    {
        //
        $seo->delete();
        session()->flash('success', 'تم حذف السيو بنجاح');

        return redirect()->route('seos.index');
    }
}
