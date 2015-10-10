<style>

	.area-tree{
		cursor: pointer;
		border:1px solid #ddd;
		border-top:none;
		list-style: none;
	}
	.area-tree:first-child{
		border-top:1px solid #ddd;
	}
	.area-tree div{
		height:35px;
		line-height: 35px;
		padding-left:5px;

	}
	.area-tree>div .add-child{
		display:none;
	}

	.area-tree>div:hover{
		background: #f2f2f2;
	}

	.area-tree>div:hover .add-child{
		display: inline;
	}

	.area-tree.selected>div{
		background: #d9edf7;
	}

</style>

<template>
	<li class="area-tree" v-class="selected:selected">
	    <div v-on="click:selectNode">
	    	<strong class="pull-right add-child" v-on="click: addChild"> + 添加子区域 &nbsp;</strong>
	    	{{model.names}}
	    </div>
	    <ul v-if="model.children" v-show="open">
	     	<area-list v-repeat = "model:model.children " on-select="{{onSelect}}" on-child="{{onChild}}" ></area-list>
	    </ul>
  	</li>
</template>

<script>
	module.exports = {
		  props: ['model',
		  		  'onSelect',
		  		  'onChild'],
		  replace: true,
		  data: function () {
		    return {
		      open: false,
		      selected:false
		    }
		  },
		  created:function(){
		  	this.$on('area-selected',function(area){
		  		this.selected = this.model.id == area.id;
		  	});
		  },
		 
		  methods: {
		    selectNode:function(){
		    	this.open = !this.open;
		    	if (this.onSelect){
	  				this.onSelect(this.model);
	  			}
		    },
		    addChild:function(e){
		    	e.stopPropagation();
		    	if (this.onChild){

	  				this.onChild(this.model);
	  			}
		    }
		  }
	}
</script>