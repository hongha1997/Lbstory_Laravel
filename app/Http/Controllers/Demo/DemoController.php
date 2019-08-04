<?php

namespace App\Http\Controllers\Demo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// thêm
use Illuminate\Support\Facades\DB;
class DemoController extends Controller
{
    public function demo() {
    	// lấy tất cả danh mục tin
    	$objCats = DB::table('cat')->get();
    	foreach ($objCats as $cat) {
    		$cid = $cat->cat_id;
    		$name = $cat->name;
    		echo "ID: {$cid} - Name: {$name}<hr/>";
    	}
    	// lấy 1 danh mục tin
    	$cat = DB::table('cat')->where('cat_id',2)->first();
    	// Hiển thị truyện có id=4 và danh mục truyện đó
    	$story = DB::table('story as s')
    	->join('cat as c', 's.cat_id', '=', 'c.cat_id')
    	->where('s.story_id', 3)
    	->select('s.story_id','s.name as sname','c.name as cname')->first();
    	dd($story);
    }
}
