<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class AjaxController extends Controller
{
	public function __construct(Contact $mcontact){
		$this->mcontact = $mcontact;
	}
    public function postTrangthai(Request $req){
    	$trangthai = $req->aTrangthai;
    	$id = $req->aId;
    	if($trangthai==0) {
    		$trangthai=1;
    	} else {
    		$trangthai=0;
    	}
    	$item = [
            'active' => $trangthai,
        ];
        $this->mcontact->editItem($id, $item);
        $contacts = $this->mcontact->getList();
        return view('admin.contact.trangthai', compact('contacts'));
    }
}
