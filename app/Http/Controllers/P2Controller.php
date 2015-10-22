<?php namespace App\Http\Controllers;
use App\Helpers\Helper;

class p2Controller extends Controller
{
    /**
     * Responds to requests to GET create
     */
     public function getcreate()
    {
       // $result='';
       // return view('pages.p2')->with('result',$result);
        return view('pages.p2');
    }
	
   /**
     * Responds to requests to POST create
     */
    public function postCreate()
    {
      /* $data=$request->Input('all');
        dd($data);
        $wordNum=if(isset($data))
        $separatorSel=
        $firstLetterUpper=
        $addNumber=
        $specialChar=
        if(isset($_POST['minWords'])){
			$wordNum= $_POST['minWords'];
		} else {
			$wordNum= 4;
		}
		if(isset($_POST['separator'])){
			$separatorSel=$_POST['separator'];
             if($separatorSel=='space')
            {
                $separatorSel=' ';
            }
		} else {
			$separatorSel='';
		}
        if(isset($_POST['ckFirstLetterUppercase'])){
			$firstLetterUpper=$_POST['ckFirstLetterUppercase'];
		} else {
			$firstLetterUpper=0;
		}
		if(isset($_POST['ckAddNumber'])){
			$addNumber=$_POST['ckAddNumber'];
		} else {
			$addNumber=0;
		}
		if(isset($_POST['ckSpecialChar'])){
			$specialChar=$_POST['ckSpecialChar'];
		} else {
			$specialChar=0;
		}*/
		//$newPassword=password_generator($wordNum,$separatorSel,$firstLetterUpper,$addNumber,$specialChar);
        //$result=helper::password_generator($wordNum,$separatorSel,$firstLetterUpper,$addNumber,$specialChar);
        //return view('pages.p2')->with('result',$result);
        return view('pages.p2');
    }

}





