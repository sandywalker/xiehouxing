<style>

	#areaForm{
		position: fixed;
		width:45%;
	}

</style>

<template>
	 <form action="" method="POST" role="form" id="areaForm">
        	
        	<div class="form-group" v-class="has-error:error&&!model.names">
        		<label for=""> 地区名称 <span class="text-danger">*</span></label>
        		<input type="text" class="form-control" v-model="model.names" v-el="names"s>
        	</div>
        	<div class="form-group" v-class="has-error:error&&!model.names_en">
        		<label for=""> 地区英文名<span class="text-danger"></span></label>
        		<input type="text" class="form-control" v-model="model.names_en" v-el="namesEn">
        	</div>
        	<div class="form-group" v-class="has-error:error&&!model.sort">
        		<label for=""> 排序<span class="text-danger"></span></label>
        		<input type="text" class="form-control" v-model="model.sort" v-el="sort">
        	</div>
        	<button type="button" class="btn btn-primary" v-on="click:saveArea">保存</button>
        	<button type="button" class="btn btn-danger" v-on="click:deleteArea">删除</button>

        </form>
</template>

<script>
	module.exports = {
		  props: ['model',
		  		  'parent',
		  		  'onSave',
		  		  'onDelete',],
		  data: function () {
		    return {
		      error:false
		    }
	  	  },
		  methods: {
		    validate:function(){
				this.error = !this.model.names||!this.model.names_en||isNaN(this.model.sort);
			},
			saveArea:function(){
				this.validate();
	  			if (this.error) return;
				if (confirm('您确定保存吗？')){
					if (this.onSave){
						this.onSave(this.model);
					}
				}
			},
			deleteArea:function(){
				if (confirm('您确定删除该地区吗？')){
					if (this.onDelete){
						this.onDelete(this.model);
					}
				}
			}
		  }
	}
</script>