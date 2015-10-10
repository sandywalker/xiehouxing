@extends('app')


@section('content')
	<h5 class="app-title">地区管理</h5>
   <div class="container-fluid" id="areaApp">
		<div class="row">
			<div class="col-md-6 col-xs-6">
				<p> <button class="btn btn-info" v-on="click:addRootArea">添加区域</button></p>
				<ul style="padding:0;">
					<area-list v-repeat="model:areas" 
						on-select="@{{selectArea}}"
						on-child="@{{addChild}}"
						></area-list>
				</ul>
			</div>
			<div class="col-md-6 col-xs-6">
				<area-form model="@{{areaForm}}" v-if="areaForm" 
					on-save="@{{saveArea}}" 
					on-delete="@{{deleteArea}}"
					/>
			</div>
		</div>
   </div>
@endsection

@section('js')
	<script src="{{ asset('/js/area.js') }}"></script>
@endsection
