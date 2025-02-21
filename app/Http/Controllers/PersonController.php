<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', ['people' => Person::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Person::create([
            'name' => $request->name,
            'age' => $request->age,
            'image' => $imagePath
        ]);

        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $person = Person::find($id);
        return view('user.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $person->update(['image' => $imagePath]);
        }

        $person->update([
            'name' => $request->name,
            'age' => $request->age,
        ]);

        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person, $id)
    {
        $person = Person::find($id);
        $person->delete();
        return redirect()->route('person.index')->with('success', 'Person deleted successfully.');
    }
}
