<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::latest()->get();
        return view('admin.size.size', compact('size'));
    }

    public function store(Request $request)
    {
        try {
            $size = DB::transaction(function () use ($request) {
                $size = Size::create([
                    'size' => $request->size,
                ]);
                return $size;
            });
            if ($size) {
                return back()->with('success', 'Size Created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $slug)
    {
        $size = Size::where('slug', $slug)->first();
        return view('admin.size.edit_size', compact('size'));
    }

    public function update(Request $request)
    {
        $size = Size::find($request->id);
        if (is_null($size)) {
            return back()->with('error', 'Size not found!');
        }
        try {
            $size = DB::transaction(function () use ($size, $request) {
                $size->update([
                    'size' => $request->size,
                ]);
                return $size;
            });
            if ($size) {
                return redirect('admin/property/size')->with('success', 'Size Edited Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id){
        $size=Size::find($id);
        if (is_null($size)) {
            return back()->with('error', 'Size Not Found!');
        }
        try {
            $size=DB::transaction(function() use($size){
                $size->delete();
                return $size;
            });
            if ($size) {
                return back()->with('success', 'Size Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
