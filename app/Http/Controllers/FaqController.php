<?php

namespace App\Http\Controllers;

use App\Http\Requests\Faq\FaqStoreRequest;
use App\Http\Requests\Faq\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.faq', compact('faqs'));
    }

    public function store(FaqStoreRequest $request)
    {
        try {
            $faq = DB::transaction(function () use ($request) {
                $faq = Faq::create([
                    'question' => $request->question,
                    'answer' => $request->answer,
                ]);
                return $faq;
            });
            if ($faq) {
                return back()->with('success', 'FAQ created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($slug)
    {
        $faq = Faq::where('slug', $slug)->first();
        return view('admin.faq.edit_faq', compact('faq'));
    }

    public function update(FaqUpdateRequest $request)
    {
        $faq = Faq::find($request->id);
        if (is_null($faq)) {
            return back()->with('error', 'FAQ not found!');
        }
        try {
            $faq = DB::transaction(function () use ($faq, $request) {
                $faq->update([
                    'question' => $request->question,
                    'answer' => $request->answer
                ]);
                return $faq;
            });
            if ($faq) {
                return redirect('admin/faq')->with('success', 'FAQ Updated!!');
            }
        } catch (\Exception $e) {
            return redirect('admin/faq')->with('error', $e->getMessage());
        }
    }

    public function destroy($id){
        $faq= Faq::find($id);
        if (is_null($faq)) {
            return back()->with('error', 'FAQ Not Found!!');
        }
        try {
            $faq=DB::transaction(function() use($faq) {
                $faq->delete();
                return $faq;
            });
            if ($faq) {
                return back()->with('success', 'FAQ Deleted Successfully!!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
