<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use joshtronic;

class LoremIpsumController extends Controller
{
    /**
     * Responds to requests to GET create
     */
     public function getcreate()
    {
       $result='';
       return view('pages.loremipsum')->with('result',$result);
    }

   /**
     * Responds to requests to POST create
     */
    public function postCreate(Request $request)
    {
        $howMany=$request->Input('howMany');
        $generate=$request->Input('generate');
        $ckArticle=$request->Input('ckArticle');
        $ckItalic=$request->Input('ckItalic');
        $ckBold=$request->Input('ckBold');
        $result=helper::generatelorim($howMany, $generate,$ckArticle ,$ckItalic ,$ckBold);
        return view('pages.loremipsum')->with('result',$result);
    }
}
