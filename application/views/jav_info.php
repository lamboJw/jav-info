<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>影片信息</title>
	<script src="static/layui/layui.js"></script>
	<link rel="stylesheet" href="static/layui/css/layui.css">
</head>
<style>
	.scroll-container{
		width: 80%;
		height: 120px;
		overflow: auto;
		border: 1px solid #e6e6e6;
		background-color: white;
	}
	.scroll-content {
		width: 100%;
	}
	#file_list li{
		list-style-type:none;
		padding-left: 10px;
		border-bottom: 1px solid #e6e6e6;
	}
	.right_lable{
		width: 100px;
	}
</style>
<body>
<form action="" class="layui-form">
	<div>
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md6" style="width:35%">
				<div class="layui-card">
					<div class="layui-card-body">
						<div class="layui-form-item" style="margin-top: 20px;">
							<label class="layui-form-label">番号：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="text" name="search_num" class="layui-input">
								</div>
								<div class="layui-input-inline" style="width: 100px;">
									<button class="layui-btn" id="check_info">搜索信息</button>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">影片类型：</label>
							<div class="layui-input-block">
								<input type="radio" name="model" value="骑兵" title="骑兵" lay-filter="model" checked="">
								<input type="radio" name="model" value="步兵" title="步兵" lay-filter="model">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">检索结果：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<div class="layui-form-mid layui-word-aux"><span class="current_page">0</span>/<span
											class="max_page">0</span></div>
								</div>
								<div class="layui-input-inline" id="change_page">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="layui-col-md6" style="width:65%">
				<div class="layui-card">
					<div class="layui-card-body">
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">资源根目录：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<input type="text" id="source_path" class="layui-input">
								</div>
								<div class="layui-input-inline">
									<button class="layui-btn" id="scan_file">扫描文件</button>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">文件列表：</label>
							<div class="layui-input-block scroll-container">
								<div class="scroll-content">
									<ul id="file_list"></ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<form class="layui-form">
	<div style="padding: 20px; background-color: #F2F2F2;">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md6" style="width:50%">
				<div class="layui-card">
					<div class="layui-card-header">电影信息</div>
					<div class="layui-card-body">
						<div class="layui-form-item">
							<label class="layui-form-label">封面图：</label>
							<div class="layui-input-block">
								<img src="" style="display: none;width: 500px;" class="cover">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">大图地址：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="text" name="fanart" class="layui-input" style="width: 350px;">
								</div>
								<div class="layui-input-inline" style="margin-left: 160px;">
									<button class="layui-btn" lay-submit="" lay-filter="save_fanart">保存图片</button>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">小图地址：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="text" name="thumb" class="layui-input" style="width: 350px;">
								</div>
								<div class="layui-input-inline" style="margin-left: 160px;">
									<button class="layui-btn" lay-submit="" lay-filter="save_thumb">保存图片</button>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">片名：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<input type="text" name="title" class="layui-input">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">演员：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<input type="text" name="actor" class="layui-input">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<div class="layui-input-inline">
								<label class="layui-form-label">制作商：</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input type="text" name="maker" class="layui-input">
									</div>
								</div>
							</div>
							<div class="layui-input-inline" style="margin-left: 110px;">
								<label class="layui-form-label">发行商：</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input type="text" name="label" class="layui-input">
									</div>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<div class="layui-input-inline">
								<label class="layui-form-label">系列：</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input type="text" name="set" class="layui-input">
									</div>
								</div>
							</div>
							<div class="layui-input-inline" style="margin-left: 110px;">
								<label class="layui-form-label">导演：</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input type="text" name="director" class="layui-input">
									</div>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<div class="layui-input-inline">
								<label class="layui-form-label">发售日：</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input type="text" name="premiered" class="layui-input">
									</div>
								</div>
							</div>
							<div class="layui-input-inline" style="margin-left: 110px;">
								<label class="layui-form-label">番号：</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input type="text" name="num" class="layui-input">
									</div>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">片长：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="text" name="runtime" class="layui-input">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">类型：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<input type="text" name="genre" class="layui-input">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">简介：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<textarea name="plot" cols="30" rows="10" class="layui-textarea"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="layui-col-md6" style="width:50%">
				<div class="layui-card">
					<div class="layui-card-header">重命名设置</div>
					<div class="layui-card-body">
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">目标根目录：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<input type="text" name="target_path" id="target_path" class="layui-input">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">文件路径：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline" style="width: 500px;">
									<input type="text" name="path" disabled lay-filter="path" class="layui-input">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">重命名格式：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="text" name="format" class="layui-input"
										   value="[{num}]{actor} - {title}">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">建立同名目录：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="checkbox" checked="" name="build_same_title_dir" lay-skin="switch" lay-text="是|否">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">建立上级目录：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="checkbox" checked="" name="build_up_level_dir" lay-skin="switch" lay-text="是|否">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">上级目录：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="text" name="up_level_dir" class="layui-input" value="{actor}">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">显示封面图：</label>
							<div class="layui-input-block">
								<div class="layui-input-inline">
									<input type="checkbox" checked="" name="show_cover" lay-skin="switch" lay-text="是|否" lay-filter="show_cover">
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable"></label>
							<div class="layui-input-block">
								<button class="layui-btn" lay-submit="" lay-filter="rename">重命名</button>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label right_lable">备注：</label>
							<div class="layui-input-block">
								<div class="layui-form-mid layui-word-aux">
									{num} ： 番号<br/>
									{actor} ： 演员<br/>
									{title} ： 标题<br/>
									{maker} ： 制作商<br/>
									{year} ： 年份<br/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</body>
<script>
	layui.use(['layer', 'form', 'jquery'], function () {
		const layer = layui.layer, form = layui.form, $ = layui.jquery;
		let jav_info_arr = [];
		let current_page = 0, max_page = 0;
		let show_cover = true;
		let model = "骑兵";
		let select_file = "";
		$("#check_info").click(function () {
			let num = $("input[name=search_num]").val();
			if (!num) {
				layer.msg("请输入番号");
				return false;
			}
			let loading = layer.load();
			$.get("jav_info/check_info", {number: num,model:model}, function (rps) {
				layer.close(loading);
				if(rps.status == "success"){
					jav_info_arr = rps.data;
					max_page = jav_info_arr.length;
					if (max_page > 0) {
						current_page = 1;
						set_info(jav_info_arr[0]);
					}else{
						alert("找不到该片");
					}
					set_page_btn();
				}else{
					alert(rps.msg);
				}
			}, "json");
			return false;
		});

		$("#scan_file").click(function () {
			let source_path = $("#source_path").val();
			if(!source_path){
				layer.msg("请填写根目录");
				return false;
			}
			let loading = layer.load();
			$.get("jav_info/scan_file",{source_path:source_path},function (rps) {
				layer.close(loading);
				let html = "";
				$("#file_list").empty();
				for(let i in rps.data){
					html += "<li id='file_path_"+i+"'><a href='javascript:void(0);'>"+rps.data[i]+"</a></li>";
				}
				$("#file_list").html(html);
			},"json");
			return false;
		});

		$(document).on('click', '#file_list li', function() {
			let path = $(this).children("a").text();
			select_file = $(this).attr("id");
			set_path(path);
		});

		function set_info(info) {
			$("input[name=fanart]").val(info['fanart']);
			$("input[name=thumb]").val(info['thumb']);
			$(".cover").attr("src", info['fanart']);
			if(show_cover){
				$(".cover").show();
			}
			$("input[name=title]").val(info['title']);
			$("input[name=actor]").val(info['actor']);
			$("input[name=maker]").val(info['maker']);
			$("input[name=label]").val(info['label']);
			$("input[name=set]").val(info['set']);
			$("input[name=director]").val(info['director']);
			$("input[name=num]").val(info['num']);
			$("input[name=premiered]").val(info['premiered']);
			$("input[name=runtime]").val(info['runtime']);
			$("input[name=genre]").val(info['genre']);
			$("textarea[name=plot]").text(info['plot']);
		}

		function set_page_btn() {
			if (max_page == 0) {
				return false;
			}
			$(".current_page").text(current_page);
			$(".max_page").text(max_page);
			if (max_page > 1) {
				let html = "";
				if (current_page == 1) {
					html += "<var class=\"layui-btn\" id=\"next_btn\">></var>";
				} else if (current_page == max_page) {
					html += "<var class=\"layui-btn\" id=\"pre_btn\"><</var>";
				} else {
					html += "<var class=\"layui-btn\" id=\"pre_btn\"><</var>";
					html += "<var class=\"layui-btn\" id=\"next_btn\">></var>";
				}
				$("#change_page").html(html);
			}
		}

		$(document).on("click","#next_btn",function(){
			if (current_page + 1 > max_page) {
				return false;
			}
			current_page++;
			set_info(jav_info_arr[current_page - 1]);
			set_page_btn();
		});
		$(document).on("click","#pre_btn",function(){
			if (current_page - 1 < 1) {
				return false;
			}
			current_page--;
			set_info(jav_info_arr[current_page - 1]);
			set_page_btn();
		});

		form.on("submit(rename)", function (data) {
			let num = $("input[name=search_num]").val();
			if(data.field['num'].toLowerCase() != num.toLowerCase()){
				layer.msg("你还没点搜索！");
				return false;
			}
			let loading = layer.load();
			data.field['model'] = model;
			console.log(data.field);
			$.post("jav_info/get_new_file",data.field,function (rps) {
				if(rps.status == "success"){
					$.post("jav_info/rename_file", data.field, function (rps) {
						$("#"+select_file).remove();
						alert(rps.msg);
						layer.close(loading);
					}, "json");
				}else{
					alert(rps.msg);
					layer.close(loading);
				}
			},"json");
			return false;
		});

		form.on('switch(show_cover)', function(data){
			show_cover = data.elem.checked;
			if(!show_cover){
				$(".cover").hide();
			}else if($(".cover").attr("src")){
				$(".cover").show();
			}
		});

		$("input[name=path]").bind('input propertychange', function () {
			let path = $(this).val();
			let regExp = "";
			if(model == "骑兵"){
				regExp = /[a-zA-Z]{2,4}-?\d{3}/i;
			}else{
				regExp = /[a-zA-Z]{2,5}-?\d{3}/i;
			}
			let num = regExp.exec(path);
			if(num){
				$("input[name=search_num]").val(num[0]);
			}
		});

		form.on("submit(save_fanart)", function (data) {
			data.field['type'] = "fanart";
			$.post("jav_info/dl_img", data.field, function (rps) {
				alert(rps.msg);
			}, "json");
			return false;
		});
		form.on("submit(save_thumb)", function (data) {
			data.field['type'] = "thumb";
			$.post("jav_info/dl_img", data.field, function (rps) {
				alert(rps.msg);
			}, "json");
			return false;
		});

		form.on("radio(model)",function (data) {
			model = data.value;
		});

		function set_path(path) {
			if (!path) {
				layer.msg("没选择文件");
				return false;
			}
			let target_path = $("#target_path").val();
			if (!target_path) {
				layer.msg("请填写目标根目录");
				return false;
			} else if (target_path.substring(target_path.length - 1, target_path.length) != "\\") {
				target_path += "\\";
				$("#target_path").val(target_path);
			}
			$("input[name=path]").val(path);
			let regExp = "";
			if (model == "骑兵") {
				regExp = /[a-zA-Z]{2,4}-?\d{3}/i;
			} else {
				regExp = /[a-zA-Z]{2,5}-?\d{3}/i;
			}
			let num = regExp.exec(path);
			if (num) {
				$("input[name=search_num]").val(num[0]);
			}
		}
	});
</script>
</html>
