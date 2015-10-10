@extends('app')


@section('content')
	<h5 class="app-title">用户管理</h5>
   <div class="container-fluid" id="userApp">
   		<div class="row">
   			<div class="col-md-9">&nbsp;</div>
   			<div class="col-md-3">
   				<p><input type="text" v-model="filter" class="form-control "></p>
   			</div>
   		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>用户名</th>
							<th>昵称</th>
							<th>Email</th>
							<th>微信</th>
							<th>角色</th>
							<th>状态</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>
						<tr v-repeat="user:users | filterBy filter">
							<td>@{{user.username}}</td>
							<td>@{{user.name}}</td>
							<td>@{{user.email}}</td>
							<td>@{{user.wechat}}</td>
							<td>@{{user.role}}</td>
							<td>
								<span class="text-success" v-show="user.states==1">正常</span>
							    <span class="text-muted" v-show="user.states==0">停用</span>	
							</td>
							<td>
								<button type="button" class="btn btn-xs btn-warning"  v-show="user.states==1 && user.username != 'admin'" v-on="click:disableUser(user)">停用</button>
								<button type="button" class="btn btn-xs btn-success"  v-show="user.states==0" v-on="click:enableUser(user)">启用</button>
								<button type="button" class="btn btn-xs btn-danger"  
									v-show="user.states==0" 
									v-on="click:deleteUser(user)">删除</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
   </div>
@endsection

@section('js')
	<script src="{{ asset('/js/user.js') }}"></script>
@endsection
