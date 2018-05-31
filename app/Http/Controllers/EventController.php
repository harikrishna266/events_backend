<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\UserCategory;
use App\Models\Category;
use App\Http\Requests\StoreEvent;
use \App\Http\Resources\EventCollection;
use \App\Http\Resources\Event as EventRe;


use Auth;
use Validator;

class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        return view('events.create', compact('categories'));
    }
    
    public function uploadImage($file){
        $imageName =  mt_rand(100,555).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/'), $imageName);
        return $imageName;
    }
    public function store(StoreEvent $request)
    {
        $validated_data = $request->validated();
        $validated_data['image'] = $this->uploadImage($validated_data['image']);
        $validated_data['user_id'] = Auth::user()->id;
        Event::create($validated_data);
        $request->session()->flash('success', "Event {$request->name} created!");        
        return redirect()->route('events.index');
    }
    public function edit(Request $request)
    {
        $event = Event::find($request->event);
        $categories = Category::all()->pluck('name','id');
        return view('events.edit', compact('event','categories'));
    }
    public function update(StoreEvent $request)
    {
            $validated_data = $request->validated();
            if(isset($validated_data['image']))
                $validated_data['image'] = $this->uploadImage($validated_data['image']);
            $validated_data['user_id'] = Auth::user()->id;
            Event::find($request->event)->update($validated_data);
            $request->session()->flash('success', "Event {$request->name} updated!");
            return redirect()->route('events.index');
    }
    public function destroy(Request $request)
    {
        $request->session()->flash('error', "Event   deleted!");
        Event::find($request->event)->delete();
        return redirect()->route('events.index');
    }

    public function getUserEventsByCategory() {
        $categories = UserCategory::where('user_id',Auth::user()->id )->pluck('category_id');
        return new  EventCollection(Event::whereIn('category_id', $categories)->get()) ;
    }

   
}
