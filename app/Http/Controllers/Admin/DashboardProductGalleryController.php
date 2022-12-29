<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Productgallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DashboardProductGalleryController extends Controller
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
            $query = Productgallery::with(['product']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <form action="' . route('admin.productgallery.destroy', $item->id) . '" method="post">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm(`apakah anda ingin menghapus data?`)">Delete</button>
                                    </form>
                                </div>
                            </div>
                        ';
                })->editColumn('photo', function ($item) {
                    return $item->photo ? '<img src="' . asset('storage/' . $item->photo) . '" alt="" width="80" >' : '';
                })
                ->rawColumns(['action','photo'])
                ->make();
        }
        return view('pages.admin.productgallery.index', [
            'title' => 'Webstore | List of Product Gallery',
            'galleries' => Productgallery::all()
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

        return view('pages.admin.productgallery.create', [
            'title' => 'Webstore | List of Product Gallery',
            'products'=>  Product::all()
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
        $validatedData =$request->validate([
            'products_id' => 'required|exists:products,id',
            'photo' => 'required|image|file|max:2054'
        ]);



      
        $validatedData['photo']= $request->file('photo')->store('gallery');

        Productgallery::create($validatedData);

        return redirect()->route('admin.productgallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productgallery  $productgallery
     * @return \Illuminate\Http\Response
     */
    public function show(Productgallery $productgallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productgallery  $productgallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Productgallery $productgallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productgallery  $productgallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productgallery $productgallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productgallery  $productgallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productgallery $productgallery)
    {
        //
        if ($productgallery->photo) {
        
            Storage::delete($productgallery->photo);
        }

        Productgallery::destroy($productgallery->id);
        return redirect()->route('admin.productgallery.index');
    }
}
