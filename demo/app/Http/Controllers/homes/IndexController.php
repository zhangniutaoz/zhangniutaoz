<?php

namespace App\Http\Controllers\homes;

use DB;
use App\Http\Model\admin\Goodstype;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Goodstype = new Goodstype;
        //侧边框的内容
        $goodstype = $Goodstype->where(['pid'=>71,'num'=>3])->get()->toArray();
        $brand = DB::table('brand')->whereBetween('id', [6, 15])->get();
        $brand1 = DB::table('brand')->whereBetween('id', [16, 25])->get();
    //获取父类的个数
        $dd = count($goodstype);
        //把子类压入数组
        $arr1 = [];
        foreach ($goodstype as $key => $value) {
            if($value['num'] == 3){
                $arr1[] = $Goodstype->where("pid",$value['id'])->where('num',4)->get()->toArray();
            }
            
        }
        for($i = 0;$i < count($arr1);$i++){
            if(empty($arr1[$i])){
                unset($arr1[$i]);
            }
        }
        // //子类下分开两个到3个
        // dd($arr1);
        $arr2 = [];
        $arr3 = [];
        $arr4 = [];
        $arr5 = [];
        foreach ($arr1 as $key => $value) {
            $arr2[] = count($value);
        }
        for($i= 0;$i<count($arr1);$i++){
            for($j= 0;$j<$arr2[$i];$j++){
                $arr3[$i][] = $arr1[$i][$j]["id"];
            }
            
            for($m= 0;$m<count($arr3[$i]);$m++){
                $arr5[$i][] = $Goodstype->where("pid",$arr3[$i][$m])->where('num',5)->get()->toArray();
                $arr4[$i][] = count($arr5[$i][$m]);
            }
        }
        // dd($arr5);
        return view('home.index',['goodstype'=>$goodstype,'dd'=>$dd,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'arr4'=>$arr4,'arr5'=>$arr5,'brand'=>$brand,'brand1'=>$brand1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
