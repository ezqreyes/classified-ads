<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(12);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $states = State::all();
        return view('admin.cities.create', compact('states'));
    }

    public function store(StoreCityRequest $request)
    {
        city::create($request->validated());
        return redirect()->route('cities.index')->with('message', 'City created.');
    }

    public function edit(City $city)
    {
        $states = State::all();
        return view('admin.cities.edit', compact('states','city'));
    }

    public function update(StoreCityRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('cities.index')->with('message', 'City updated.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message', 'City deleted.');
    }
}
