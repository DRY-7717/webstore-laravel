<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
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
        if (request()->ajax()) {
            $query = Product::with(['user','category']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('admin.product.edit', $item->id) . '">Edit</a>
                                    <form action="' . route('admin.product.destroy', $item->id) . '" method="post">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm(`apakah anda ingin menghapus data?`)">Delete</button>
                                    </form>
                                </div>
                            </div>
                        ';
                })->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin.product.index', [
            'title' => 'Webstore | List of Product'
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
        return view('pages.admin.product.create',[
            'title' => 'Webstore | Create Product',
            'categories' => Category::all(),
            'users' => User::all()
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
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        Product::create($validatedData);

        return redirect()->route('admin.product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
        return view('pages.admin.product.edit', [
            'title' => 'Webstore | Edit Product',
            'categories' => Category::all(),
            'users' => User::all(),
            'product' => $product
        ]);

        
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
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        Product::where('id', $product->id)->update($validatedData);

        return redirect()->route('admin.product.index');
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
        Product::destroy($product->id);

        return redirect()->route('admin.product.index');
    }
}
