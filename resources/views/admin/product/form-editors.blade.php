<div class="row">
		<div class="col-md-12">
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">行程信息 <span class="text-danger">*</span> </a></li>
			    <li role="presentation"><a href="#trafficTab" aria-controls="trafficTab" role="tab" data-toggle="tab">参考交通</a></li>
			    <li role="presentation"><a href="#hotelTab" aria-controls="hotelTab" role="tab" data-toggle="tab">参考住宿</a></li>
			    <li role="presentation"><a href="#qaTab" aria-controls="qaTab" role="tab" data-toggle="tab">常见问题</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
			    	<script id="container" name="content" type="text/plain" style="min-height:500px;"></script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="trafficTab">
			    	<script id="traffic" name="traffic" type="text/plain" style="min-height:200px;"></script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="hotelTab">
			    	<script id="hotel" name="hotel" type="text/plain" style="min-height:200px;"></script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="qaTab">
			    	<script id="qa" name="qa" type="text/plain" style="min-height:200px;"></script>
			    </div>
			  </div>

			</div>
			<br>
			
			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="{{URL::previous()}}" class="btn btn-default">取消</a>

			
		</div>
	</div>