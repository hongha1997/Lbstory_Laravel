<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $primaryKey = "contact_id";
    public $timestamps = false;
    public function getList() {
        return $this->paginate(getenv('ADMIN_PAGINATE'));
    }
    public function delItem($id) {
        return $this->where('contact_id', $id)->delete();
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function editItem($id, $item) {
        return $this->where('contact_id', $id)->update($item);
    }
}
