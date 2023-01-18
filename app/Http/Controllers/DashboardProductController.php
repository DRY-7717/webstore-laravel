<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Galleryproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.dashboard-product', [
            'title' => 'Web Store | Product',
            'products' => Product::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.dashboard-product-create', [
            'title' => 'Web Store | Product Create',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        $validatedData['user_id'] = auth()->user()->id;

        $product = Product::create($validatedData);

        $gallery = [
            'product_id' => $product->id,
            'photo' => $request->file('photo')->store('gallery'),
        ];


        Galleryproduct::create($gallery);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        //
        return view('pages.dashboard-product-detail', [
            'title' => 'Web Store | Product Detail',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function galleryupload(Request $request)
    {
        # code...
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'photo' => 'required|image|file|max:2054'
        ]);

        $validatedData['photo'] = $request->file('photo')->store('gallery');

        Galleryproduct::create($validatedData);

        return redirect()->route('product.show', $request->product_id);
    }

    public function gallerydelete(Request $request, $id)
    {
        # code...

        $gallery = Galleryproduct::findOrFail($id);

        if ($gallery->photo) {
            Storage::delete($gallery->photo);
        }

        Galleryproduct::destroy($gallery->id);
        return redirect()->route('product.show', $gallery->product_id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        $validatedData['user_id'] = auth()->user()->id;

        Product::where('id', $product->id)->update($validatedData);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
