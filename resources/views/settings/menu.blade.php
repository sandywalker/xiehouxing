		
		<aside class="col-md-3 settings-side">
		   <br>
		   <h4 class="text-center">设置</h4>
		   <br>
			<div class="list-group">
			  <a href="/settings" class="list-group-item  @if($menu=='')active @endif"> <i class="glyphicon glyphicon-info-sign"></i> 基础信息</a>
			  <a href="/settings/styles" class="list-group-item  @if($menu=='style')active @endif"> <i class="glyphicon glyphicon-picture"></i> 空间设置</a>
			  <a href="/settings/likes" class="list-group-item  @if($menu=='like')active @endif"> <i class="glyphicon glyphicon-gift"></i> 喜好设置</a>
			  <a href="/settings/security" class="list-group-item  @if($menu=='security')active @endif"> <i class="glyphicon glyphicon-asterisk"></i> 安全设置</a>
			</div>
		</aside>