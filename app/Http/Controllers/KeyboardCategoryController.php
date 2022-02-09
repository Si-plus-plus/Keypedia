<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\KeyboardCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeyboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manager', KeyboardCategory::class);

        return view('category.index', [
            'categories' => KeyboardCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404, "No Page");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404, "No Page");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $keyboards = Keyboard::where('category_id', $id);

        if ($request->exists('filterType') && $request->exists('queryText')) {
            $keyboards = $keyboards->where($request->filterType, 'like', '%' . $request->queryText . '%');
        }

        return view('category.show', [
            'category' => KeyboardCategory::find($id),
            'keyboards' => $keyboards->paginate(8),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('manager', KeyboardCategory::class);

        return view('category.edit', [
            'category' => KeyboardCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('manager', KeyboardCategory::class);

        $this->validate($request, [
            'name' => [ 'required', 'unique:keyboard_categories,name', 'min:5' ],
        ]);

        $category = KeyboardCategory::find($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();

            Storage::putFileAs('public/images/', $image, $filename);
            $category->image = 'public/images/'. $filename;
        }

        $category->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('manager', KeyboardCategory::class);

        KeyboardCategory::find($id)->keyboards()->delete();
        KeyboardCategory::destroy($id);
        return redirect()->back();
    }
}
