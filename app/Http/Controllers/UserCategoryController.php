<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCategory;
use Auth;

class UserCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addUserCatgories(Request $request) {
        
        UserCategory::where('user_id',Auth::user()->id )->delete();
        foreach ($request->all() as $cat) {
            $newusercat = new UserCategory;
            $newusercat->user_id = Auth::user()->id;
            $newusercat->category_id = $cat;
            $newusercat->save();
        }
        return response()
            ->json(true);
            
    }

    public function getAllUserCategories() {

    }

}
