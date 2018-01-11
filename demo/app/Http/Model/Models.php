<?php

namespace App\Models;

// 加密基类
use Crypt;
// 解密基类
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Models extends EloquentModel
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData ($id = '', $status = '')
    {
        if ($id) {
            // 有传值,则根据主键条件查询
            $res = self::findOrFail($id);
            $results = $res->toArray();
            foreach ($results as $key => $value) {
                if ($key == 'password') {
                    $results['password'] = substr($value, 0, 6);
                }
            }
        }elseif ($status) {
            // 根据状态查询
            $results = self::where('status', $status)
                           ->orderBy('id', 'desc')
                           ->get();
        }else {
            // 没有id,则查询所有
            $results = self::orderBy('id', 'desc')
                           ->get();
        }
        // 返回查询结果集
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id,可选
     * @param  array  $fields, 所有需要添加或者修改的字段,必须
     * @param  array  $custom, 自定义添加或者修改的字段,可选
     * @return \Illuminate\Http\Response
     */
    public function updateData ($request, $id = null, $fields, $custom)
    {
        if ($id == null) {
            // 没有id,则执行新增
            $results = $this;
        }else {
            // id有值,则执行修改
            $results = self::findOrFail($id);
        }

        // 根据传值表字段以及表单值修改
        $count = count($fields);
        for ($i=0; $i < $count; $i++) {
            if ($fields[$i] == 'password') {
                $results->password = Crypt::encrypt($request->input('password'));
            }else {
                $results->$fields[$i] = $request->input($fields[$i]);
            }
        }

        if ($custom) {
            foreach ($custom as $key => $value) {
                $results->$key = $value;
            }
        }

        // 执行更新
        return $results->save();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deteleData ($id)
    {
        // 执行删除
        return self::destroy($id);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus ($id)
    {
        // 执行修改状态
        $status = self::getData($id)['status'];
        if ($status == 'enable') {
            $res = self::where('id', $id)
                           ->update(['status' => 'disable']);
            $results['result'] = $res;
            $results['message'] = '管理员状态禁用成功！';
        }else {
            $res = self::where('id', $id)
                           ->update(['status' => 'enable']);
            $results['result'] = $res;
            $results['message'] = '管理员状态启用成功！';
        }
        return $results;
    }
}
