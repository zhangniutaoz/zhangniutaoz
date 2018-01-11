<?php

namespace App\Http\Controllers\admins;

use DB;
use Image;
use Illuminate\Http\Request;
use App\Http\Model\admin\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count=DB::table('brand')->count();
        $brand = Brand::orderBy('id','desc')->paginate(3);
        return view('admin.Brand_Manage',['brand'=>$brand,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Add_Brand');
    }
    public function add(Request $request)
    {
        // $this->validate($request,$this->rules,$this->message);
        //获取图片信息
        $file = $request->file('image');
        //图片所在目录
        $filedir="admin\\image";
        $imagesName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $newImagesName=md5(time()).random_int(1,5).".".$extension;
        $info = $file->move($filedir,$newImagesName);
        if($info){
            $img = Image::make($info)->resize(25, 25);
            $imgName = "s" . $newImagesName;
            
            $img->save($filedir . '/' . $imgName);
            $brand = new Brand;
            $brand->brandname = $request->brandname;
            $brand->images = $newImagesName;
            $brand->img = $imgName;

            //执行添加
            $brand->save();
            
            return redirect()->action('admins\BrandManageController@index');
        }
    }
        /*
    |---------------------------------------------------------------------------
    |删除品牌
    |---------------------------------------------------------------------------
    */
    public function del(Request $request){
        //接受id
        $id = $request->id;
        //查出要删除id的信息
        $arr = Brand::find($id);
        //获取新旧图片的路径
        $img = $arr['img'];
        $images = $arr['images'];
        //图片所在目录
        $filedir="admin/image";
        //拼接原图和缩略图路径
        $a = $filedir . "/" . $img;
        $a1 = $filedir . "/" . $images;
        //执行删除
        $del = Brand::destroy($id);
        //数据库删除成功后删除图片的原文件
        if($del){
            if(file_exists($a)){
                unlink($a);
            }
            if(file_exists($a1)){
                unlink($a1);
            }
            //跳转到banner页面
            return "删除成功";
        }else{
            return "删除失败";
        }
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
        //接受传值
        $file = $request->file('image');
        //获取到图片的路径并修改
        //定义图片上传路径
        $filedir="admin\\image";
        //获取图片名称
        $imagesName = $file->getClientOriginalName();
        //获取图片后缀
        $extension = $file->getClientOriginalExtension();
        // $arr = ['jpg','png','gif'];  
        // if(in_array($extension,$arr)){
            //拼接新的文件名字
            $newImagesName=md5(time()).random_int(1,5).".".$extension;
            // echo "<pre>";
            // var_dump($newImagesName);
            //移动到文件 
            $info = $file->move($filedir,$newImagesName);
            if($info){
                //把原图缩略
                $img = Image::make($info)->resize(25, 25);
                //拼接缩略图新的文件名字
                $imgName = "s" . $newImagesName;
                // dd($imgName);
                //把新图片移动到文件 
                $img->save($filedir . '/' . $imgName);
                //接受id
                $id = $request->id;
                //查出要修改id的信息
                $arr = Brand::find($id);
                // dd($arr);
                //获取原图片的路径
                $Yimg = $arr->img;
                $Yimages = $arr->images;
                //原图片所在目录
                $filedir="admin/image";
                //拼接原图和缩略图路径
                $a = $filedir . "/" . $Yimg;
                $a1 = $filedir . "/" . $Yimages;
                //把新的banner图添加到数据库
                $brand = new Brand;
                $brand->brandname = $request->brandname;
                $brand->images = $newImagesName;
                $brand->img = $imgName;
                $update = $brand
                        ->where("id",$id)
                        ->update(['brandname'=>$brand->brandname,'images'=>$brand->images,'img'=>$brand->img]);
                //数据库更新成功后删除图片的原文件
                if($update){
                    if(file_exists($a)){
                        unlink($a);
                    }
                    if(file_exists($a1)){
                        unlink($a1);
                    }
                    //跳转到banner页面
                    return redirect()->action('admin\BrandManageController@index');
                }
            }else{
                // return "添加成功";   
                // return redirect()->action('admin\BannerController@index');
            }
        // }
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
        //接受修改id
        $id = $request->id;
        //查出修改id的内容
        $arr = Brand::find($id)->toArray();
        // dd($arr);
        //传值到前台
        return view('/admin/brand_add',['arr' => $arr]);
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
