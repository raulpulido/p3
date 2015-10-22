<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class RandomUserController extends Controller
{
    /**
     * Responds to requests to GET create
     */
     public function getcreate()
    {
       return view('pages.randomuser');
    }

   /**
     * Responds to requests to POST create
     */
    public function postCreate(Request $request)
    {
        $howMany=$request->Input('howMany');
        $user=helper::generateuser($howMany);
        //dd($user);
        return view('pages.randomuser')->with('user', $user);
    }
}
