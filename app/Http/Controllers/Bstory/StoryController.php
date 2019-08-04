<?php

namespace App\Http\Controllers\Bstory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Story;

class StoryController extends Controller
{
	public function __construct(Cat $mCat, Story $mStory){
		$this->mcat = $mCat;
		$this->mstory =$mStory;
	}
    public function index(){
    	// lấy cat của leftbar
    	//$objCat = new Cat();
    	//$objCats = $objCat->getListForLeftBar();
    	$objCats = $this->mcat->getListForLeftBar();
    	// lấy các story
    	//$objStory = new Story();
        $objStoriesNew = $this->mstory->getListNew();
    	$objStories = $this->mstory->getListPublic();
        return view('bstory.story.index',compact('objCats','objStories', 'objStoriesNew'));
    }
    public function cat($slug, $id){
        $objStories = $this->mstory->getListPublic();
        $objCats = $this->mcat->getListForLeftBar();
        $objStoriesNew = $this->mstory->getListNew();
        $cat = $this->mstory->getItemCat($id);
        $nameCat = $this->mcat->getNameCat($id);
        return view('bstory.story.cat',compact('objCats','nameCat', 'cat','objStories', 'objStoriesNew'));
    }
    public function detail($slug, $id, Request $req){
        
    	// lấy cat của leftbar
    	//$objCat = new Cat();
    	$objCats = $this->mcat->getListForLeftBar();
    	// 
        $objStoriesNew = $this->mstory->getListNew();
    	//$objStory = new Story();
    	$story = $this->mstory->getItem($id);
        $haha = $this->mstory->getLienQuan($story->cat_id);
        $aa = $story->story_id;
         // $req->session()->forget('haha');
         // exit();
        if($req->session()->has('haha'.$aa)==false){
            //số lượt xem tăng
            $hihi = $this->mstory->getItem($id);
            $soluotxem = $hihi->counter;
            //dd($soluotxem);
            $item = [
                'counter' => $soluotxem+1,
            ];
            $result = $this->mstory->haha($id, $item);
            $req->session()->put('haha'.$aa, 'huhu');
        }
        $hihihi = $this->mstory->getItem($id);
        $soso = $hihihi->counter;
        



        return view('bstory.story.detail',compact('objCats', 'story','haha', 'objStoriesNew', 'soso'));
    }
    public function postSearch(Request $request){
        $objCats = $this->mcat->getListForLeftBar();
        $objStoriesNew = $this->mstory->getListNew();
        $tukhoa = $request->tukhoa;
        $tintucs = $this->mstory->search($tukhoa);
        //dd($tintucs);
        return view('bstory.story.search',compact('objCats','objStoriesNew','tukhoa', 'tintucs'));
    }
}
