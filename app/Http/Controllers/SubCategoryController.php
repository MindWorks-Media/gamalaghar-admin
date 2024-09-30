<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategory\SubCategoryCreateRequest;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $mainCategory = MainCategory::latest()->get();
        $subCategory = SubCategory::join('main_categories', 'main_categories.id', '=', 'sub_categories.main_category_id')
            ->select('sub_categories.id', 'sub_categories.sub_category', 'main_categories.main_category', 'sub_categories.slug')
            ->get();
        return view('admin.sub_category.sub_category', compact('mainCategory', 'subCategory'));
    }

    public function store(SubCategoryCreateRequest $request)
    {
        try {
            $subCategory = DB::transaction(function () use ($request) {
                $subCategory = SubCategory::create([
                    'sub_category' => $request->sub_category,
                    'main_category_id' => $request->main_category_id,
                ]);
                return $subCategory;
            });
            if ($subCategory) {
                return back()->with('success', 'Sub-Category created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->first();
        $mainCategory = MainCategory::latest()->get();
        return view('admin.sub_category.edit_sub_category', compact('subCategory', 'mainCategory'));
    }

    public function update(Request $request)
    {
        $subCategory = SubCategory::find($request->id);
        if (is_null($subCategory)) {
            return back()->with('error', 'Sub-Category Not Found!');
        }
        try {
            $subCategory = DB::transaction(function () use ($request, $subCategory) {
                $subCategory->update([
                    'sub_category' => $request->sub_category,
                    'main_category_id' => $request->main_category_id,
                ]);
                return $subCategory;
            });
            if ($subCategory) {
                return redirect('admin/category/sub-category')->with('success', 'Sub-Category Edited Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $subCategory = SubCategory::find($id);
        if (is_null($subCategory)) {
            return back()->with('error', 'Sub-Category Not Found!');
        }
        try {
            $subCategory = DB::transaction(function () use ($subCategory) {
                $subCategory->delete();
                return $subCategory;
            });
            if ($subCategory) {
                return back()->with('success', 'Sub-Category is Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
