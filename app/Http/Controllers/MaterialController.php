<?php

namespace App\Http\Controllers;

use App\Http\Requests\Material\MaterialCreateRequest;
use App\Http\Requests\Material\MaterialUpdateRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material=Material::latest()->get();
        return view('admin.material.material', compact('material'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialCreateRequest $request)
    {
        try {
            $material=DB::transaction(function() use($request){
                $material=Material::create([
                    'material'=>$request->material,
                ]);
                return $material;
            });
            if($material){
                return back()->with('success', 'Material Created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $material=Material::where('slug', $slug)->first();
        return view('admin.material.edit_material', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialUpdateRequest $request)
    {
        $material = Material::find($request->id);
        if(is_null($material)){
            return back()->with('error', 'Material Not found!');
        }
        try {
            $material=DB::transaction(function() use($request, $material){
                $material->update([
                    'material'=>$request->material,
                ]);
                return $material;
            });
            if ($material) {
                return redirect('admin/property/material')->with('success', 'Material Edited Successfully!');
            }
        } catch (\Exception $e) {
            return redirect('admin/property/material')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material=Material::find($id);
        if (is_null($material)) {
            return back()->with('error', 'Material Not Found!');
        }
        try {
            $material=DB::transaction(function() use($material){
                $material->delete();
                return $material;
            });
            if ($material) {
                return back()->with('success', 'Material Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
