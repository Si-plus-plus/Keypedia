<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\KeyboardCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404, "No Page");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manager', Keyboard::class);

        return view('keyboard.create', [
            'categories' => KeyboardCategory::all(),
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
        $this->authorize('manager', Keyboard::class);

        $this->validate($request, [
            'name' => [ 'required', 'unique:keyboards,name', 'min:5' ],
            'price' => [ 'required', 'integer', 'gt:0' ],
            'description' => [ 'required', 'min:20' ],
            'image' => [ 'required' ],

            'category_id' => [ 'required' ],
        ]);

        $keyboard = new Keyboard;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;

        if ($request->hasFile('image')) { // must be true
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();

            Storage::putFileAs('public/images/', $image, $filename);
            $keyboard->image = 'public/images/'. $filename;
        }

        $keyboard->category_id = $request->category_id;
        $keyboard->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('keyboard.show', [
            'keyboard' => Keyboard::find($id),
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
        $this->authorize('manager', Keyboard::class);

        return view('keyboard.edit', [
            'categories' => KeyboardCategory::all(),
            'keyboard' => Keyboard::find($id),
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
        $this->authorize('manager', Keyboard::class);

        $this->validate($request, [
            'name' => [ 'required', 'unique:keyboards,name', 'min:5' ],
            'price' => [ 'required', 'integer', 'gt:0' ],
            'description' => [ 'required', 'min:20' ],

            'category_id' => [ 'required' ],
        ]);

        $keyboard = Keyboard::find($id);
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();

            Storage::putFileAs('public/images/', $image, $filename);
            $keyboard->image = 'public/images/'. $filename;
        }

        $keyboard->category_id = $request->category_id;
        $keyboard->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('manager', Keyboard::class);

        Keyboard::destroy($id);
        return redirect()->back();
    }
}
