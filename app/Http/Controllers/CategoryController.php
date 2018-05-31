<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategory;


use Validator;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function create() {
        return view('category.create');
    }
    
    public function uploadImage($file) {
        $imageName =  mt_rand(100,555).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/'), $imageName);
        return $imageName;
    }
    public function store(StoreCategory $request) {
        $validated_data = $request->validated();
        $validated_data['image'] = $this->uploadImage($validated_data['image']);
        $validated_data['category_map_marker'] = $this->uploadImage($validated_data['category_map_marker']);
        Category::create($validated_data);
        $request->session()->flash('success', "Category {$request->name} created!");        
        return redirect()->route('categories.index');
    }
    public function edit(Request $request) {
        $category = Category::find($request->category);
        return view('category.edit', compact('category'));
    }
    public function update(StoreCategory $request) {

        $validated_data = $request->validated();
        if(isset($validated_data['image']))
            $validated_data['image'] = $this->uploadImage($validated_data['image']);
        if(isset($validated_data['category_map_marker']))
            $validated_data['category_map_marker'] = $this->uploadImage($validated_data['category_map_marker']);

    
        Category::find($request->event)->update($validated_data);
        $request->session()->flash('success', "Category {$request->name} updated!");
        return redirect()->route('categories.index');
    }
    public function destroy(Request $request) {
        $request->session()->flash('error', "Category   deleted!");
        Category::find($request->category)->delete();
        return redirect()->route('categories.index');
    }

   
}
