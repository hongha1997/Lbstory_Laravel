<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table        = "story";
    protected $primaryKey   = "story_id";
    public $timestamps      = true;
    public function getListPublic() {
    	return $this->select('story_id','name', 'picture', 'preview_text','cat_id', 'counter','created_at')->orderBy('story_id','desc')->paginate(5);
    }
    public function getItem($id) {
    	return $this->findOrFail($id);
    }
    public function getItemByCat($cat_id) {
        return $this->where('cat_id',  '=', $cat_id)->get();
    }
    public function getItemCat($id) {
    	return $this->select('story_id','name', 'picture', 'preview_text', 'counter','created_at')->where('cat_id',$id)->paginate(5);
    }
    public function getListNew() {
    	return $this->orderBy('story_id', 'ASC')->take(6)->get();
    }
    public function getLienQuan($id) {
    	return $this->where('cat_id',$id)->orderBy('story_id', 'ASC')->take(3)->get();
    }
    // admin
    public function getList() {
        return $this->join('cat','story.cat_id','=','cat.cat_id')->select('story.story_id','story.name','story.preview_text','story.picture','story.counter','cat.name as catname')->orderBy('story_id','DESC')->paginate(getenv('ADMIN_PAGINATE'));
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('story_id', $id)->delete();
    }
    public function getOldPicture($id) {
        return $this->where('story_id', $id)->first();
    }
    public function editItem($id, $item) {
        return $this->where('story_id', $id)->update($item);
    }
    public function search($tukhoa) {
        //$tukhoa = stripos($tukhoa);
        return $this->where('name', 'like', "%$tukhoa%")->orWhere('name', 'like', '%' . $tukhoa . '%')->paginate(5);
    }

    // tăng lượt đọc
    public function haha($id, $item) {
        return $this->where('story_id', $id)->update($item);
    }
}
