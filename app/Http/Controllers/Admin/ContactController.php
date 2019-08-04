<?php

namespace App\Http\Controllers\Admin;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct(Contact $mcontact){
		$this->mcontact = $mcontact;
	}
	public function index(){
    	$contacts = $this->mcontact->getList();
        return view('admin.contact.index', compact('contacts'));
    }
    public function del($id) {
    	$result = $this->mcontact->delItem($id);
    	if($result) {
        	return redirect()
        		->route('admin.contact.index')
        		->with('msg', 'Xóa thành công');
        } else {
        	return redirect()
        		->route('admin.contact.index')
        		->with('msg', 'Lỗi');
        }
    }
}
