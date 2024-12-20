<?php

namespace App\Http\Controllers;

use App\Jobs\LanguageCreate;
use App\Models\Language;
use App\Mail\LanguagePosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
    public function create(Language $language)
    {
        Gate::authorize('create',$language);
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

        $language = Language::create($fields);
        
        $user = Auth::user();
        LanguageCreate::dispatch($language ,$user);   //use job and queue for mailing

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
        Gate::authorize('update',$language);
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
        Gate::authorize('delete',$language);
        $language->delete();

        return to_route('languages.index');


    }
}
