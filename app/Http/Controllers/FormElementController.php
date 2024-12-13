<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormElement;
use Illuminate\Http\Request;

class FormElementController extends Controller
{

    public function renderOption()
    {
        $html = view('dashboard.form.render-element.option')->render();
        return response()->json([
            'html' => $html
        ], 200);
    }

    public function generateElement(Request $request)
    {
        $data['config'] = json_decode($request->config,true);
        $html = view('dashboard.form.render-element.generate-element', $data)->render();
        return response()->json([
            'html' => $html
        ], 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function saveForm(Request $request,Form $form)
    {
        
        $data['config'] = json_decode($request->config,true);
        $data['mode'] = 'save';
        $html = view('dashboard.form.render-element.generate-element', $data)->render();
        $form->update(['html'=>$html]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

}
