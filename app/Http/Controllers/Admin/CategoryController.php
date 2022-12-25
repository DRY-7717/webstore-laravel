<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
            $query = Category::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('admin.category.edit', $item->id) . '">Edit</a>
                                    <form action="' . route('admin.category.destroy', $item->id) . '" method="post">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm(`apakah anda ingin menghapus data?`)">Delete</button>
                                    </form>
                                </div>
                            </div>
                        ';
                })->editColumn('logo', function ($item) {
                    return $item->logo ? '<img src="' . asset('storage/' . $item->logo) . '" alt="" width="40" >' : '';
                })
                ->rawColumns(['action', 'logo'])
                ->make();
        }

        return view('pages.admin.category.index', [
            'title' => 'Webstore | Category'
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
        return view('pages.admin.category.create', [
            'title' => 'Web Store | Create',
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'image|file|max:255',
        ]);
        $validatedData['logo'] = $request->file('logo')->store('category_img');
        $validatedData['slug'] = Str::slug($request->name);
        Category::create($validatedData);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('pages.admin.category.edit', [
            'title' => 'Web Store | Edit',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'image|file|max:255',
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        if ($request->file()) {
            if ($category->logo) {
                Storage::delete($category->logo);
            }
            # code...
            $validatedData['logo'] = $request->file('logo')->store('category_img');
        }
        Category::where('id', $category->id)->update($validatedData);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //

        if ($category->logo) {
            Storage::delete($category->logo);
        }

        Category::destroy($category->id);

        return redirect()->route('admin.category.index');
    }
}
