<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Contact/Index',['contacts'=> Contact::with('category')->get(),
        'categories'=> Category::all()
        ]);
    }


    public function create()
    {
        return Inertia::render('Contact/Create',['categories'=> Category::all()]);
    }


    public function store(Request $request)
    {
     $request->validate([

            'name' => 'required|min:6|max:100',
            'phone' => 'required|min:11',
            'category_id' => 'required',



        ]);
    $contact=Contact::create($request->all());



        return redirect()->route('contacts.show',$contact->id)->with('success', 'Save Successfully');

    }


    public function show( Contact $contact)
    {


 return Inertia::render('Contact/Show',['contact'=>$contact->load('category')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Contact/Edit',['contact' => Contact::findOrFail($id),
       'categories' => Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $contact  =Contact::findOrFail($id);
      $contact->update($request->all());
      return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back();
    }
}
