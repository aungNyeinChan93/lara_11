<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::latest()->get();
        return view("test.languages.index", compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|min:3|max:20|unique:languages,name',
        ]);

        Language::create($fields);

        return to_route('languages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {

        return view('test.languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view("test.languages.edit", compact('language'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $fileds = $request->validate([
            'name' => 'required|min:3|max:20|unique:languages,name',
        ]);

        $language->update($fileds);

        return to_route('languages.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return to_route('languages.index');


    }
}
