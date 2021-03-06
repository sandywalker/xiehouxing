var Vue = require('vue');
Vue.use(require('vue-resource'));

var token = $('meta[name="csrf-token"]').attr('content');
Vue.http.headers.common['X-CSRF-TOKEN'] = token;


new Vue({
	el:'#guideApp',
	data:{
		comments:[],
		show:false
	},
	components:{
		'guide-comments-modal':require('./components/comments-modal.vue')
	},
	methods:{
		showComments:function(id){
			this.show = true;
			this.$http.get('/admin/guides/' + id + '/comments',function(comments){
				this.comments = comments;
				this.show = true;
			});
		},
		hideComments:function(){
			this.comments = [];
			this.show = false;
		},
		deleteComment:function(comment){
			if (confirm('您确定删除这条评论吗?')){
				this.$http.delete('/admin/gcomments/'+comment.id);
				this.comments.$remove(comment);	
			}
		}
	}
});