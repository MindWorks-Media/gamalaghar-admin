<?php

namespace App\Http\Controllers;

use App\Http\Requests\Province\ProvinceStoreRequest;
use App\Http\Requests\Province\ProvinceUpdateRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function index()
    {

        $province = Province::all();
        return view('admin.setting.province.province', compact('province'));
    }

    public function store(ProvinceStoreRequest $request)
    {
        try {
            $province = DB::transaction(function () use ($request) {
                $province = Province::create([
                    'province' => $request->province,
                ]);
                return $province;
            });
            if ($province) {
                return back()->with('success', 'Province Added Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $slug)
    {
        $province = Province::where('slug', $slug)->first();
        return view('admin.setting.province.edit_province', compact('province'));
    }

    public function update(ProvinceUpdateRequest $request)
    {
        $province = Province::find($request->id);
        if (is_null($province)) {
            return back()->with('error', 'Province not Found!');
        }

        try {
            $province = DB::transaction(function () use ($province, $request) {
                $province->update([
                    'province' => $request->province,
                ]);
                return $province;
            });
            if ($province) {
                return redirect('admin/setting/province')->with('success', 'Province Edited Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id){
        $province= Province::find($id);
        if (is_null($province)) {
            return back()->with('error', 'Province not Found!');
        }
        try {
            $province=DB::transaction(function () use($province) {
                $province->delete();
                return $province;
            });
            if ($province) {
                return back()->with('success', 'Province Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
