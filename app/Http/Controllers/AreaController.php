<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\AreaStoreRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $areas = Area::join('cities', 'cities.id', '=', 'areas.city_id')
             ->join('provinces', 'provinces.id', '=', 'cities.province_id')
             ->select(
                 'areas.id',
                 'areas.area',
                 'cities.city',
                 'provinces.province',
                 'areas.slug'
             )
             ->get();

        return view('admin.setting.area.area', compact('province', 'areas'));
    }

    public function store(AreaStoreRequest $request)
    {
        try {
            $areas = DB::transaction(function () use ($request) {
                $areaNamesString = $request->input('areas')[0];
                $areaNames = explode(',', $areaNamesString);

                foreach ($areaNames as $areaName) {
                    $area = Area::create([
                        'area' => trim($areaName),
                        'city_id' => $request->city_id,
                    ]);
                    $areas[] = $area;
                }
                return $areas;
            });

            if (!empty($areas)) {
                return back()->with('success', 'Area Created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function getCities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->get();
        return response()->json($cities);
    }

    public function edit(string $slug)
    {
        $area = Area::where('slug', $slug)->first();
        $city = City::all();
        $province = Province::all();
        return view('admin.setting.area.edit_area', compact('area', 'province', 'city'));
    }

    public function destroy(string $id){
        $area = Area::find($id);
        if (is_null($area)) {
            return back()->with('error',  'Area Not Found!');
        }
        try {
            $area = DB::transaction(function () use ($area) {
                $area->delete();
                return $area;
            });
            if ($area) {
                return back()->with('success', 'Area Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
