<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\CityStoreRequest;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $city = City::join('provinces', 'provinces.id', '=', 'cities.province_id')
            ->select('cities.id', 'cities.city', 'provinces.province', 'cities.slug')
            ->get();
        return view('admin.setting.city.city', compact('province', 'city'));
    }

    public function store(CityStoreRequest $request)
    {
        try {
            $cities = DB::transaction(function () use ($request) {
                $cityNamesString = $request->input('cities')[0]; // Get the first (and only) element of the cities array
                $cityNames = explode(',', $cityNamesString);
                
                foreach ($cityNames as $cityName) {
                    $city = City::create([
                        'city' => trim($cityName), // Trim whitespace from city name
                        'province_id' => $request->province_id,
                    ]);
                    $cities[] = $city;
                }
                return $cities;
            });
            if (!empty($cities)) {
                return back()->with('success', 'City Created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $slug)
    {
        $city = City::where('slug', $slug)->first();
        $province = Province::all();
        return view('admin.setting.city.edit_city', compact('city', 'province'));
    }

    public function update(Request $request)
    {
        $city = City::find($request->id);
        if (is_null($city)) {
            return back()->with('error', 'City Not Found!');
        }
        try {
            $city = DB::transaction(function () use ($city, $request) {
                $city->update([
                    'city' => $request->city,
                    'province_id' => $request->province_id,
                ]);
                return $city;
            });
            if ($city) {
                return redirect('admin/setting/city')->with('success', 'City Updated Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $city = City::find($id);
        if (is_null($city)) {
            return back()->with('error',  'City Not Found!');
        }
        try {
            $city = DB::transaction(function () use ($city) {
                $city->delete();
                return $city;
            });
            if ($city) {
                return back()->with('success', 'City Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
