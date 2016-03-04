@extends('app')

@section('content')

<h5 class="app-title">SEO优化管理</h5>

<div class="container-fluid" id="seoApp">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered text-sm">
				<thead>
					<tr>
						<th width="60">页面</th>
						<th>title</th>
						<th>keywords</th>
						<th>description</th>
						<th width="60">操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($seoInfos as $seo)
					<tr>
						<td>
							@if($seo->tag == 'index')
								首页
							@elseif($seo->tag == 'activity')
								活动
							@elseif($seo->tag == 'guide')
								攻略
							@elseif($seo->tag == 'notes')
								游记
							@endif
							<span class="text-muted">({{$seo->tag}})</span>
						</td>
						<td> {{$seo->title}}</td>
						<td>{{$seo->keywords}}</td>
						<td>{{$seo->description}}</td>
						<td><a href="/admin/seo/{{$seo->id}}/edit" class="btn btn-info btn-xs">编辑</a></td>	
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>




@endsection