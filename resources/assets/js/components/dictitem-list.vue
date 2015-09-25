

<style>
	

</style>
<template>


			<div id="items">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>名称</th>
							<th>值</th>
							<th>排序</th>
							<th width="80">操作</th>
						</tr>
					</thead>
					<tbody>
						<tr v-repeat="item:items | orderBy 'orders'">
							<td>
							{{item.name}}
							</td>
							<td>
								{{item.value}}
							</td>
							<td>
								{{item.orders}}
							</td>
							<td>
								<div class="action" > 
									<button href="#" class="btn  btn-xs" v-on="click:editItem(item)"><i class="glyphicon glyphicon-pencil text-info"></i></button>
									<button class="btn  btn-xs" v-on="click:deleteItem(item)"><i class="glyphicon glyphicon-remove text-danger"></i></button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				
			</div>
</template>

<script>
	module.exports = {
	  props:[	'items','onEdit','onDelete'],
	  data: function () {
	    return {
	      filter:'',
		  reverse:false,
		  activeItem:null
	    }
	  },
	  methods:{
		deleteItem:function(item){
			if (this.onDelete){
				this.onDelete(item);
			}
		},
		editItem:function(item){
			if (this.onEdit){
				this.onEdit(item);
			}
		}
	  }

	}
</script>