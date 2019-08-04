<?php

namespace App\Http\Controllers\Bstory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Story;
use App\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
	public function __construct(Cat $mCat, Story $mStory, Contact $mContact){
		$this->mcat = $mCat;
		$this->mstory =$mStory;
		$this->mcontact =$mContact;
	}
    public function getIndex(){
    	$objCats = $this->mcat->getListForLeftBar();
    	$objStoriesNew = $this->mstory->getListNew();
        return view('bstory.contact.index', compact('objCats','objStoriesNew'));
    }
    public function postIndex(ContactRequest $request){
     // public function postIndex(Request $request){ 
   	 // $request->validate(
     //        [
     //            'name' => 'required',
     //            'email' => 'required | email',
     //            'website' => 'required',
     //            'message' => 'required',
     //        ],
     //        [
     //            'name.required'=>'Yều cầu nhập',
     //            'email.required'=>'Yều cầu nhập',
     //            'email.email'=>'Yều cầu nhập định dạng Email',
     //            'website.required'=>'Yều cầu nhập',
     //            'message.required'=>'Yều cầu nhập',
     //        ]
     //    );
        $name 		= trim($request->name);
        $email 		= trim($request->email);
        $website 	= trim($request->website);
        $message 	= trim($request->message);
        $item = [
        	'name' => $name,
        	'email' => $email,
        	'website' => $website,
        	'content' => $message,
        ];
        $result = $this->mcontact->addItem($item);
        if($result) {
        	return redirect()
        		->route('bstory.contact.index')
        		->with('msg', 'Gửi thành công');
        } else {
        	return redirect()
        		->route('bstory.contact.index')
        		->with('msg', 'Lỗi');
        }
    }
}
