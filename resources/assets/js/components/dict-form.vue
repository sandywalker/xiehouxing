<style>

	
	/*.modal.in{
		display: block;
	}*/
</style>

<template>
<div class="modal " v-show="edit" v-transition="bounce"  id="dictForm" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on="click:cancel"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加/修改数据字典</h4>
      </div>
      <div class="modal-body ">
        <form action="" method="POST" role="form">
        
        	<div class="form-group" v-class="has-error:error&!dict.name">
        		<label for="">字典名 <span class="text-danger">*</span></label>
        		<input type="text" class="form-control" v-model="dict.name" v-el="dictName">
        	</div>
        	<div class="form-group" v-class="has-error:error&&!dict.code">
        		<label for=""> 字典代码<span class="text-danger">*</span></label>
        		<input type="text" class="form-control" v-model="dict.code" v-el="dictCode">
        	</div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" v-on="click:cancel">取消</button>
        <button type="button" class="btn btn-primary" v-on="click:saveDict">保存</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal-backdrop" v-show="edit" v-transition="bounce" ></div>
		
</template>

<script>
	module.exports = {
	  props:[	'dict',
	  			'edit',
	  			'onSave'],
	  data: function () {
	    return {
	      error:false
	    }
	  },
	  created:function(){
	  	this.$watch('edit',function(){
	  		if (this.edit){
	  			this.$$.dictName.focus();
	  		}
	  	});
	  },
	  methods:{
	  	validate:function(){
			this.error = !this.dict.name||!this.dict.code;
		},
	  	saveDict:function(){
	  		this.validate();
	  		if (this.error) return;
	  		this.edit = false;
	  		if (this.onSave){
	  			this.onSave(this.dict);
	  		}
	  		
	  	},
	  	cancel:function(){
	  		this.error = false;
	  		this.edit = false;
	  	}
	  }
	}
</script>