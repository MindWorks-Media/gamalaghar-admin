<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSizePrice;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $Category = MainCategory::with('subCategories')->latest()->get();
        $size = Size::latest()->get();

        return view('admin.product.add_product', compact('Category', 'size'));
    }

    public function viewProduct(Request $request)
    {

        $keyword = $request->query('keyword');

        $products = Product::with('media')->when($keyword, function ($query) use ($keyword) {
            $query->where('product_name', 'like', "%{$keyword}%")
                ->orWhere('product_code', 'like', "%{$keyword}%");
        })->latest()->paginate(10);


        return view('admin.product.view_product', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        try {
            $product = DB::transaction(function () use ($request) {

                $size = $request->input('size');
                $price = $request->input('price');
                $product_stock = $request->input('product_stock');
                $highestPrice = max($price);


                $product = Product::create([
                    'user_id' => auth()->user()->id,
                    'product_name' => $request->product_name,
                    'sub_category_id' => $request->sub_category_id,
                    'short_description' => $request->short_description,
                    'description' => $request->description,
                    'discount' => $request->discount,
                    'product_code' => $request->product_code,
                    'product_price' => $highestPrice,

                ]);

                // Loop through the arrays and save each product
                if (!empty($size) && !empty($price) && !empty($product_stock) && count($size) === count($price) && count($price) === count($product_stock)) {
                    // Loop through the arrays and save each product
                    for ($i = 0; $i < count($size); $i++) {
                        // Check if any of the values are null or empty strings, if so, skip this iteration
                        if ($size[$i] !== null && $price[$i] !== null && $product_stock[$i] !== null && $size[$i] !== '' && $price[$i] !== '' && $product_stock[$i] !== '') {
                            $productSizePrice = new ProductSizePrice();
                            $productSizePrice->size_id = $size[$i];
                            $productSizePrice->product_id = $product->id;
                            $productSizePrice->price = $price[$i];
                            $productSizePrice->product_stock = $product_stock[$i];
                            $productSizePrice->save();
                        }
                    }
                }
                // dd($request->product_image);
                foreach ($request->file('product_image') as $image) {
                    $productImage=ProductImage::create([
                        'product_id'=>$product->id
                    ]);
                    $productImage->addMedia($image)
                        ->toMediaCollection('product_image');
                }
                return $product;
            });


            if ($product) {
                return back()->with('success', 'Product Created Successfully!');
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
        $product = Product::with('media', 'productImages')->where('slug', $slug)->first();
        $Category = MainCategory::with('subCategories')->latest()->get();
        // Eager load 'size' when fetching productSizePrices
        $productSizePrices = ProductSizePrice::with('size')->where('product_id', $product->id)->get();
        return view('admin.product.edit_product', compact('product', 'Category', 'productSizePrices'));
    }


    public function update(Request $request)
    {
        try {
            $product = DB::transaction(function () use ($request) {
                $product = Product::find($request->id);

                if (!$product) {
                    return back()->with('error', 'Product not found!');
                }

                $size = $request->input('size');
                $price = $request->input('price');
                $product_stock = $request->input('product_stock');
                $highestPrice = max($price);

                $product->update([
                    'product_name' => $request->product_name,
                    'sub_category_id' => $request->sub_category_id,
                    'short_description' => $request->short_description,
                    'description' => $request->description,
                    'discount' => $request->discount,
                    'product_code' => $request->product_code,
                    'product_price' => $highestPrice,
                ]);

                // Update or add new size and price relationships
                if (!empty($size) && !empty($price) && !empty($product_stock) && count($size) === count($price) && count($price) === count($product_stock)) {
                    for ($i = 0; $i < count($size); $i++) {
                        if ($size[$i] !== null && $price[$i] !== null && $product_stock[$i] !== null && $size[$i] !== '' && $price[$i] !== '' && $product_stock[$i] !== '') {
                            ProductSizePrice::updateOrCreate(
                                ['product_id' => $product->id, 'size_id' => $size[$i]],
                                ['price' => $price[$i], 'product_stock' => $product_stock[$i]]
                            );
                        }
                    }
                }

                // Update images through the ProductImage model
                if ($request->hasFile('product_image')) {
                    // Get existing product images
                    $productImages = ProductImage::where('product_id', $product->id)->get();

                    // Delete old media for each existing ProductImage entry
                    foreach ($productImages as $productImage) {
                        $productImage->clearMediaCollection('product_image');
                    }

                    // Add the new media
                    foreach ($request->file('product_image') as $image) {
                        // Create a new ProductImage entry or update existing ones
                        $productImage = ProductImage::updateOrCreate(
                            ['product_id' => $product->id],
                            ['product_id' => $product->id]
                        );

                        // Add the new image to media collection
                        $productImage->addMedia($image)->toMediaCollection('product_image');
                    }
                }
                return $product;
            });

            if ($product) {
                return redirect('admin/products/view-product')->with('success', 'Product Edited Successfully!');
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
        $product = Product::find($id);
        if (is_null($product)) {
            return back()->with('error', 'Product Not Found!');
        }
        try {
            $product = DB::transaction(function () use ($product) {
                $product->delete();
                return $product;
            });
            if ($product) {
                return back()->with('success', 'Product Deleted Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
