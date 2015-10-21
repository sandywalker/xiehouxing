<style>
	
</style>
<template>
<div class="modal" v-show="show" v-transition="bounce"  id="commentsModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on="click:close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">攻略评论</h4>
      </div>

      <div class="modal-body">
         <table class="table" >
         	<tbody>
         		<tr v-repeat="comment:comments" class="text-sm">
         			<td width="120">{{comment.user.name}}</td>
         			<td>
         				<span>{{comment.title}}</span> <br>
         				<span class="text-muted" v-show="comment.content">
         					{{comment.content}}
         				</span>
         			</td>
         			<td width="180">
         				{{comment.created_at}}
         			</td>
         			<td width="40">
         				<a href="#" v-on="click:deleteComment(comment)">删除</a>
         			</td>
         		</tr>
         	</tbody>
         </table>
         <p class="text-center text-muted" v-show="!comments.length">该攻略暂时没有评论！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" v-on="click:close">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal-backdrop " v-show="show" v-transition="bounce" ></div>
		
</template>
<script>
	module.exports = {
		props:['comments','show','onClose','onDelete'],
		methods:{
			close:function(){
				if (this.onClose){
					this.onClose();
				}
			},
			deleteComment:function(comment){
				if (this.onDelete){
					this.onDelete(comment);
				}
			}
		}
	}
</script>