<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{

    public function index()
    {

    }
    public function create()
    {
        return Inertia::render('Contact/Create',['categories' =>Category::all()]
        );
    }

    public function store(Request $request)
    {
     $request->validate([
      'name' => 'required',
      'phone'=> 'required',
      'category_id'=>'required'

        ]);

       //Contact::create($request->all());
      //Contact::create($data);
       //return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
dd($request->all());

    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
