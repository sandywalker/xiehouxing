@if (Auth::guest())
    <div class="well well-sm">
        <p>&nbsp;</p>
        <div class="text-center text-muted">邂逅行的小伙伴您好，@include('auth/login-pop',['url'=>URL::current().'#join'])后就可以报名啦！</div>
        <p>&nbsp;</p>
    </div>
@elseif ($joined)
	@if($member->states == 0)
		<p><strong class="text-orange">您已经成功报名了,提早下单有优惠！</strong></p>
	@elseif ($member->states == 1)
		<p><strong class="text-orange">您已经成功下单,支付完就可以出发啦！</strong></p>
	@endif
	<table class="table table-bordered text-sm">
		<thead>
			<th width="80">状态</th>
			<th width="80">称呼</th>
			<th width="100">联系电话</th>
			<th width="80">性别</th>
			<th width="80">人数</th>
			<th>同行伙伴</th>
			<th>操作</th>
		</thead>
		<tbody>
			<td>@include('activity.states',['states'=>$member->states])</td>
			<td>{{$member->name}}</td>
			<td>{{$member->phone_number}}</td>
			<td>@include('wedgits.sex',['sex'=>$member->sex])</td>
			<td>{{$member->count}}</td>
			<td>{{$member->companion}}</td>
			<td>
				@if ($member->states == 0)
					<a href="/activities/{{$activity->id}}/orders/create?memberId={{$member->id}}" class="btn btn-warning btn-sm">下订单</a> &nbsp;&nbsp;
					<a  class="btn-remove" href="/activities/{{$activity->id}}/cancel/{{$member->id}}" data-message="机会难得，您确定取消此次活动报名吗？">取消</a>
				@elseif($member->states > 0)
					<a href="/activities/orders/{{$member->order->id}}" class="btn btn-success btn-sm" target="_blank">查看订单</a>
				@endif
			</td>

		</tbody>
	</table>
@else
	<div class="xh-joinform">

	    <h3 class="sec-title">我要报名</h3>

	    <form method="POST" action="/activities/{{$activity->id}}/join" id="joinForm">
	    <div class="bd">
	    	@include('error')
	    	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    	 <input type="hidden" name="activity_id" value="{{ $activity->id }}">
	    	 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	         <div class="form-item">
	            <span class="lbl">称呼</span>
	            <div class="ui-input inp-tel"><input name="name" class="" type="text" value="{{$user->name}}" required
	            data-msg="请填写称呼"></div>
	            
	        </div>
	        <div class="form-item">
	            <span class="lbl">联系电话</span>
	            <div class="ui-input inp-tel"><input 
	            	name="phone_number" class="_j_add_phone" type="number" minlength="11" maxlength="11"
	            	placeholder="请输入您的联系方式" value="{{$user->phone_number}}" required 
	            	data-msg="为了方便联系您，请填写有效的电话号码">
	            </div>
	            <span class="tips"><span class="text-danger">*必填</span>：只对活动负责人员和本人公开</span>
	        </div>
	        <div class="form-item">
	            <span class="lbl">性别</span>
	            <div class="gender">
	                <label class="radio-inline">
					  <input type="radio" name="sex" id="inlineRadio1" value="0" 
					  @if($user->sex == 2) checked="checked" @endif> 女
					</label>
					<label class="radio-inline">
					  <input type="radio" name="sex" id="inlineRadio2" value="1"
					  @if($user->sex == 1) checked="checked" @endif
					  > 男
					</label>
	            </div>
	        </div>
	        <div class="form-item">
	            <span class="lbl">同行人数</span>
	            <div class="num">
	                <div class="inp-num-suffix">女<span class="gray">(/人)</span></div>
	                <div class="ui-input inp-num"><input type="number" value="0" required data-msg="请输入有效的数字" name="girls" class="_j_together_women"></div>
	                
	            </div>
	            <div class="num">
	            	<div class="inp-num-suffix">男<span class="gray">(/人)</span></div>
	                <div class="ui-input inp-num"><input type="number" value="0" required data-msg="请输入有效的数字"  name="boys" class="_j_together_men"></div>
	                
	            </div>
	            
	        </div>
	        <div class="form-item">
	            <span class="lbl">同行名单</span>
	            <div class="ui-input inp-list">
	            <input type="text" name="companion" class="_j_together_names"></div>
	        </div>
	        <div class="form-item">
	            <span class="lbl">备注</span>
	            <div class="ui-textarea"><textarea  name="memo" class="_j_together_remark"></textarea></div>
	        </div>
	        <div class="form-item">
	               <button class="btn  btn-warning btn-lg" >&nbsp; &nbsp;报名&nbsp; &nbsp;</button>
	                                            </div>
	    </div>
	</div>
	</form>

@endif