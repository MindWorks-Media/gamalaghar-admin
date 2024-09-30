<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainCategory\MainCategoryCreateRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCategoryController extends Controller
{
    public function index()
    {
        $mainCategory = MainCategory::latest()->get();
        return view('admin.main_category.main_category', compact('mainCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainCategoryCreateRequest $request)
    {
        try {
            $mainCategory = DB::transaction(function () use ($request) {
                $mainCategory = MainCategory::create([
                    'main_category' => $request->main_category,
                ]);
                return $mainCategory;
            });
            if ($mainCategory) {
                return back()->with('success', 'Main Category Created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mainCategory = MainCategory::find();
        return view(compact('mainCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $mainCategory = MainCategory::where('slug', $slug)->first();
        return view('admin.main_category.edit_main_category', compact('mainCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $mainCategory = MainCategory::find($request->id);
        if (is_null($mainCategory)) {
            return back()->with('error', 'Category not found!');
        }
        try {
            $mainCategory = DB::transaction(function () use ($request, $mainCategory) {
                $mainCategory->update([
                    'main_category' => $request->main_category,
                ]);
                return $mainCategory;
            });
            if ($mainCategory) {
                return redirect('admin/category/main-category')->with('success', 'Category Updated Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mainCategory = MainCategory::find($id);
        if (is_null($mainCategory)) {
            return back()->with('error', 'Category not found!');
        }
        try {
            $mainCategory = DB::transaction(function () use ($mainCategory) {
                $mainCategory->delete();
                return $mainCategory;
            });
            if ($mainCategory) {
                return back()->with('success', 'Category Deleated Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
