<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use App\Http\Requests\FaqsRequest;


class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs = Faq::latest()->get();
        return view('faqs.index', compact('faqs'));
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
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqsRequest $request)
    {
        //
        $input = $request->all();

        Faq::create($input);

        session()->flash('success', 'تم اضافة السؤال بنجاح');

        return redirect()->route('faqs.index');

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
    public function edit(Faq $faq)
    {
        //
        return view('faqs.create', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqsRequest $request, Faq $faq)
    {
        //
        $input = $request->all();

        $faq->update($input);
        session()->flash('success', 'تم تحديث السؤال بنجاح');

        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
        $faq->delete();
        session()->flash('success', 'تم حذف السؤال بنجاح');

        return redirect()->route('faqs.index');
    }
}
