<?php

namespace App\Http\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Goodstype extends Model
{
    //
    protected $table = 'goods_type';

    //访问器
 //    public function getsexAttribute($value)
	// {
	// 	if ($value == 1) {
	// 		return '男';
	// 	}else{
	// 		return '女';
	// 	}
	// }

	// //protected $dateFormat = 'U';

	// //修改器
 //    public function setnameAttribute($value)
	// {
	// 	$this->attributes['name'] = bcrypt($value);
	// }
}
