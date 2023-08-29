<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::paginate(12);
        return view('admin.states.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.states.create', compact('countries'));
    }

    public function store(StoreStateRequest $request)
    {
        State::create($request->validated());
        return redirect()->route('states.index')->with('message', 'State created.');
    }

    public function edit(State $state)
    {
        $countries = Country::all();
        return view('admin.states.edit', compact('countries','state'));
    }

    public function update(StoreStateRequest $request, State $state)
    {
        $state->update($request->validated());
        return redirect()->route('states.index')->with('message', 'State updated.');
    }

    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'State deleted.');
    }
}
