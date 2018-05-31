<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;


use Validator;

class EventUserController extends Controller
{
    
    public function create()
    {
        return view('category.create');
    }
    
    public function uploadImage($file){
        $imageName =  mt_rand(100,555).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/'), $imageName);
        return $imageName;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'name'=> 'required',
            'description'=> 'required',
            'image' => 'required'
        ]);

        $data = $request->except('_token');
        if($validator->fails()) 
            return redirect()->route('categories.create')
                    ->withErrors($validator)
                    ->withInput();
        $data['image'] =    $this->uploadImage($request->image);  
        $company =  Category::create($data);
        $request->session()->flash('success', "Category {$request->name} created!");
        return redirect()->route('categories.index');
    }
    public function edit(Request $request)
    {
        $category = Category::find($request->category);
        return view('category.edit', compact('category'));
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'name'=> 'required',
            'description'=> 'required',
            'image' => 'required'
        ]);

        $data = $request->except('_token');
        if($validator->fails()) 
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

        $data['image'] =    $this->uploadImage($request->image);  
        
        Category::find($request->category)
          ->update($data);

        $request->session()->flash('success', "Category {$request->name} updated!");
        return redirect()->route('categories.index');
    }
    public function destroy(Request $request)
    {
        $request->session()->flash('error', "Category   deleted!");
        Category::find($request->category)->delete();
        return redirect()->route('categories.index');
    }

   
}
