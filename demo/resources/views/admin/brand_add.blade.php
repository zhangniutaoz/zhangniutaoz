<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/admin/css/style.css"/>       
        <link href="/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css" />
        	<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/admin/assets/js/bootstrap.min.js"></script>
		<script src="/admin/assets/js/typeahead-bs2.min.js"></script>           	
        <script src="/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/admin/assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="/admin/assets/js/ace-elements.min.js"></script>
		<script src="/admin/assets/js/ace.min.js"></script>
<title>系统设置</title>

</head>

<body>
<div class="margin clearfix">
    <form action="/admin/brandmanage/edit" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="stystems_style">
            <div class="tabbable">
                <div class="tab-content">
                    <div id="home" class="tab-pane active">
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>品牌名</label>
                                <div class="col-sm-9">
                                    <input type="text" id="website-title" name="brandname" placeholder="" value="{{$arr['brandname']}}" class="col-xs-10 ">
                                    <input type="hidden" name="id" value="{{$arr['id']}}">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>品牌图</label>
                                <div class="col-sm-9">
                                    <input type="file" id="website-title" name="image" placeholder="" value="" data-validate="required:请上传图片" class="col-xs-10 ">
                                </div>
                        </div>
                        <div class="Button_operation"> 
                            <button class="btn btn-primary radius" type="submit"> 提交</button>
                        </div>
                    </div>
                    <div id="profile" class="tab-pane "></div>
                    <div id="dropdown" class="tab-pane"></div>
                </div>
    		</div>
        </div>
    </form>
</div>
</body>
</html>