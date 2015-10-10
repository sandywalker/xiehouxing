

<style>
	#dicts .action{
		display: none;
	}

	#dicts .btn-xs{
		background: none;
		padding:0 3px;
		margin:0;
		border:none;
	}

	#dicts tr{
		cursor: pointer;
	}
	#dicts   tbody tr:hover{
		background: #eee;
	}
	#dicts   tbody tr.active{
		background: #ddd;	
	}

	#dicts  tr:hover .action.active{
		display: block;
	}

</style>
<template>


			<div id="dicts">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>字典</th>
						</tr>
					</thead>
					<tbody>
						<tr v-repeat="dict:dicts | filterBy filter " 
						    v-class="active:isActive(dict)" 
						    v-on="click:selectDict(dict)"
						    >
							<td>
								<div class="action pull-right" v-class="active:isActive(dict)"> 
									<button href="#" class="btn  btn-xs btn-alpha" v-on="click:editDict(dict)"><i class="glyphicon glyphicon-pencil text-info"></i></button>
									<button class="btn  btn-xs btn-alpha" v-on="click:deleteDict(dict)"><i class="glyphicon glyphicon-remove text-danger"></i></button>
								</div>
							{{dict.name}} <!-- <span class="text-muted">({{dict.code}})</span> --></td>
						</tr>
					</tbody>
				</table>
				
			</div>
</template>

<script>
	module.exports = {
	  props:[	'dicts',
	  			'filter',
	  			'onDelete',
	  			'onEdit',
	  			'onSelect',
	  			'dictIndex'],
	  data: function () {
	    return {
	      filter:'',
		  sortKey:'name',
		  reverse:false,
		  activeDict:null
	    }
	  },
	  created:function(){
	  	this.$on('dict-added',function(dict){
	  		this.selectDict(dict);	
	  	});
	  },
	  methods:{
	  	sortDicts:function(sortKey){
			this.reverse = sortKey==this.sortKey?!this.reverse:false;
			this.sortKey = sortKey;
		},
		deleteDict:function(dict){
			if (this.onDelete){
				this.onDelete(dict);
			}
		},
		editDict:function(dict){
			if (this.onEdit){
				this.onEdit(dict);
			}
		},
		isActive:function(dict){
			return this.dictIndex>=0&&dict.code == this.activeDict.code; 
		},
		selectDict:function(dict){
			this.activeDict = dict;
			if (this.onSelect){
				this.onSelect(dict);
			}
		}
	  }

	}
</script>