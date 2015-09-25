<style>

	/*.modal-backdrop{
		display: none;
	}
	.modal-backdrop.in{
		display: block;
	}*/
	/*.modal.in{
		display: block;
	}*/
</style>

<template>
<div class="modal" v-show="itemEdit" v-transition="bounce"  id="itemForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on="click:cancel"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加/修改数据字典值</h4>
      </div>

      <div class="modal-body">
        <form action="" method="POST" role="form">
        
        	<div class="form-group" v-class="has-error:error&!item.name">
        		<label for="">名称 <span class="text-danger">*</span></label>
        		<input type="text" class="form-control" v-model="item.name" v-el="itemName">
        	</div>
        	<div class="form-group" v-class="has-error:error&&!item.value">
        		<label for=""> 值<span class="text-danger">*</span></label>
        		<input type="text" class="form-control" v-model="item.value">
        	</div>
        	<div class="form-group">
        		<label for=""> 排序</label>
        		<input type="number" class="form-control" v-model="item.orders">
        	</div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" v-on="click:cancel">取消</button>
        <button type="button" class="btn btn-primary" v-on="click:saveItem">保存</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal-backdrop " v-show="itemEdit" v-transition="bounce" ></div>
		
</template>

<script>
	module.exports = {
	  props:[	'item',
	  			'itemEdit',
	  			'onSave'],
	  data: function () {
	    return {
	      error:false
	    }
	  },
	  created:function(){
	  	this.$watch('itemEdit',function(){
	  	if (this.itemEdit){
	  			this.$$.itemName.focus();
	  		}
	  	});
	  },
	  methods:{
	  	validate:function(){
			this.error = !this.item.name||!this.item.value;
		},
	  	saveItem:function(){
	  		this.validate();
	  		if (this.error) return;
	  		if (this.onSave){
	  			this.onSave(this.item);
	  		}
	  		this.itemEdit = false;
	  	},
	  	cancel:function(){
	  		this.error = false;
	  		this.itemEdit = false;
	  	}
	  }
	}
</script>