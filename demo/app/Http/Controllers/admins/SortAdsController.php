<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\admin\Goodstype;

class SortAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据库分类总条数
        $count=DB::table('goods_type')->count();
        //分页展示数据
         $type=DB::table('goods_type')->orderBy('path','desc')->paginate(11);
         $type1=DB::table('goods_type')->orderBy('path','desc')->get();
         return view('admin/Sort_ads',['goodstype'=>$type,'type1'=>$type1,'count'=>$count]);
    }
    public function add(Request $request)
    {
        // 实例化
        $add = new Goodstype;
        // 赋值
        $add->pid = $request->pid;
        $add->type = $request->type;
        $id = Goodstype::where('id',$add->pid)->first()->toArray();
        $add->path = $id['path'].$add->pid.',';
        $num = substr_count($add->path,",");
        $add->num = $num;
        $add->save();
        // 执行添加
        // 判断是否添加成功,添加成功执行更新
        // $id = Goodstype::where('type',$add->type)->first();
        // //父类数组
        // $arr = $add->find($add->pid);
        // //父类path
        // $ppath = $arr["path"];
        // // 当前path
        // $path = $ppath.$add->pid.",";
        // $pathid = $ppath.$add->pid.",".$id["id"];
        // // dd($path);
        // // 当前num
        // $num = substr_count($path,",");
        // // dd($num);
        // $arr1 = Goodstype::find($id["id"]);
        // // 赋值
        // $arr1->path =  $path;
        // $arr1->num =  $num;
        // $arr1->pathid =  $pathid;
        // // 更新
        // 重定向
        return redirect()->action('admins\SortAdsController@index')->with("添加成功");
    }
    //分类删除
    public function del(Request $request){
        // 
        $del = new Goodstype;
        //接受id并赋值
        $id = $request->id;
        // dd($arr1);
        if($id == "19"){
            //返回到ajax
            return "此类别是根类别，不可删除";
        }else{
            //查出所有pid的所有值
            $arr = $del->select(["pid"])->get()->toArray();
            foreach ($arr as $v) {
                $a[] = in_array($id, $v);
            }
            //如果此id在pid中说明此id有子类
            if(in_array(true, $a)){
                //返回到ajax
                return "此类别含有子类，请先删除子类";
            }else{
                //执行删除
                $info = $del->where("id",$id)->delete();
                if($info){
                    //返回到ajax
                    return $id;
                }else{
                    //返回到ajax
                    return "删除失败";
                }
            }
        }

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
    public function edit(Request $request)
    {
        // 接受传值
        $id = $request->id;
        // dd($id);
        // 实例化
        $type = new Goodstype;
        // 接受传值
        $type->type = $request->type;
        $update = $type->where("id",$id)->update(["type" => $type->type]);
        return redirect()->action('admins\SortAdsController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // 接受传值
        $id = $request->id;
        // 查询要修改id的内容
        $arr = Goodstype::find($id);
        return view('admin/Systems',['arr' => $arr]);
        // 执行修改
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
