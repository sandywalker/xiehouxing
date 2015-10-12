	

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<legend>添加横幅</legend>
			 <div class="form-group">
				<label for="">  标签 <span class="text-danger">*</span> </label>
				<select name="tag" id="tag" value="" class="form-control">
					<option value="">请选择标签</option>
					@foreach($tags as $tag)
						<option value="{{$tag->value}}">{{$tag->name}}</option>
					@endforeach
				</select>
			</div>
			 <div class="form-group">
				<label for="">  标题 <span class="text-danger">*</span> </label>
				<input type="text" class="form-control" name="title" placeholder="标题">
			</div>
			<div class="form-group">
				<label for="">描述</label>
				<textarea class="form-control" name="description"></textarea>
			</div>
			<div class="form-group">
				<label for=""> 横幅图片 <span class="text-danger">*</span></label>
				<input type="file" class="form-control" name="photo" placeholder="横幅图片">
			</div>
			 <div class="form-group">
				<label for="">链接地址</label>
				<input type="text" class="form-control" name="link" placeholder="链接地址">
			</div>
			<div class="form-group">
				<label for="">打开方式</label>
				<select name="target" id="target" class="form-control">
					<option value="_blank" selected="selected">新页面</option>
					<option value="_self">本页面</option>
				</select>
			</div>
			 <div class="form-group">
				<label for="">排序</label>
				<input type="number" class="form-control" name="orders" placeholder="排序" value="1">
			</div>


			{{-- <div class="form-group">
				<label for="">Html内容</label>
				<script id="container" name="content" type="text/plain"></script>
			</div> --}}


			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<button type="button" class="btn btn-default" onClick="history.back();">取消</button>

			<p>
			@include('error')
			</p>

		</div>
	</div>
</div>
	

	
