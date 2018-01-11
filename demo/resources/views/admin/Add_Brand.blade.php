<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加品牌</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/admin/css/style.css"/>       
        <link rel="stylesheet" href="/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css" />
        <link href="/admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/admin/assets/js/bootstrap.min.js"></script>
        <script src="/admin/assets/js/typeahead-bs2.min.js"></script>
         <script src="/admin/assets/layer/layer.js" type="text/javascript"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.queue.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.speed.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/handlers.js"></script>
</head>

<body>
<div class=" clearfix">
 <div id="add_brand" class="clearfix">
 	<form action="/admin/brandmanage/add" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
 <div class="left_add" style="width:100%;">
   <div class="title_name" style="width:100%;">添加品牌</div>
   	<ul class="add_conent">
	    <li class=" clearfix">
	    	<label class="label_name"><i>*</i>品牌名称：</label>
	    	<input name="brandname" type="text" class="add_text"/>
	    </li>
	    <li class=" clearfix">
	    	<label class="label_name">品牌图片：</label>
           	<div class="demo l_f">
	           	<input type="file" name="image" value="上传图片" />
           	</div> 
	    </li>
  	</ul>
 </div>
 <div class="button_brand">
  	<button type="submit" class="btn btn-warning" value="提交"/>提交</button>
  </div>
  </form>
 </div>
</div>
</body>
</html>