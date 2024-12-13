<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['forms'] = Form::all();
        return view('dashboard.form.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $html = view('dashboard.form.render.create')->render();
        return response()->json([
            'html'=>$html
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->all();
        Form::create($data);
        return response()->json('berhasil ',200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        $data['form'] = $form;
        return view('dashboard.form.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        
        $data['form']=$form;
        $html = view('dashboard.form.render.edit',$data)->render();
        return response()->json([
            'html'=>$html
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $data = request()->all();
        $form->update($data);
        return response()->json('berhasil ',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Form $form)
    {
        
        $data['form']=$form;
        $html = view('dashboard.form.render.delete',$data)->render();
        return response()->json([
            'html'=>$html
        ],200);
    }

    public function destroy(Form $form)
    {
        $form->delete();
        return response()->json('berhasil ',200);
    }

    public function viewForm(Form $form) {
        $data['form']=$form;
        return view('form', $data);
    }
}
