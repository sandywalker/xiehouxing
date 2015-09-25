@extends('app')


@section('content')
	<h5 class="app-title">数据字典</h5>
	<div class="container-fluid" id="dictApp">
		
		<div class="row">
			<div class="col-md-3" id="dictPanel">
				<div class="row">
					<div class="col-md-6"><p><a href="#" class="btn btn-block btn-default" v-on="click:addDict">+ 添加字典</a></p></div>
					<div class="col-md-6"><p><input type="text" v-model="filter" class="form-control "></p></div>
				</div>
				<dict-list  dicts="@{{dicts}}"
							filter="@{{filter}}" 
							dict-index="@{{@dictIndex}}"
							on-edit="@{{editDict}}" 
							on-delete="@{{deleteDict}}"
							on-select="@{{selectDict}}">
				</dict-list>
				<dict-form v-show="edit" 
					dict="@{{edict}}" 
					edit="@{{@ edit}}"
					on-save="@{{saveDict}}"
				>
				</dict-form>
			</div>
			<div class="col-md-9">
				<div id="itemPanel">
					<p  class="hide" v-class="show:dictIndex >= 0" >
						<span class="pull-right">当前字典：<span class="text-main">@{{dict.name}}</span></span>
						<a href="#" class="btn btn-default " v-on="click:addItem">+ 添加值</a>
					</p>
					<dictitem-list  
						items="@{{items}}" 
						v-show="dictIndex>=0&&items.length"
						on-edit="@{{editItem}}"
						on-delete="@{{deleteItem}}"
					>
					</dictitem-list>
					<dictitem-form v-show="itemEdit" 
						item="@{{item}}" 
						item-edit="@{{@ itemEdit}}"
						on-save="@{{saveItem}}"
					>
					</dictitem-form>
				</div>
				<div id="emptyPanel" class="well" v-show="dictIndex < 0">
					<p>请选择左侧的字典进行操作！</p>
				</div>
			</div>
		</div>
		
	</div>

	<div class="container">
	<div id="dictApp">
		
		
		<!-- <pre>
			@{{ $data | json }}
		</pre> -->
	</div>

</div>

@endsection

@section('js')
	<script src="{{ asset('/js/dict.js') }}"></script>
@endsection