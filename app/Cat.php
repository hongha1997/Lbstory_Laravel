<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = "cat";
    protected $primaryKey = "cat_id";
    public $timestamps = false;
    public function getListForLeftBar() {
    	return $this->orderBy('cat_id', 'ASC')->get();
    }
    public function getNameCat($id) {
    	return $this->findOrFail($id);
    }
    public function getList() {
        return $this->get();
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('cat_id', $id)->delete();
    }
    public function getItem($id) {
        return $this->findOrFail($id);
    }
    public function editItem($id, $item) {
        return $this->where('cat_id', $id)->update($item);
    }
    //
    public function delItemCon($id) {
        return $this->where('parent', $id)->delete();
    }
    public function getItemCon($id) {
        return $this->where('parent', $id)->first();
    }
}
