var Vue = require('vue');
Vue.use(require('vue-resource'));

var token = $('meta[name="csrf-token"]').attr('content');
Vue.http.headers.common['X-CSRF-TOKEN'] = token;


new Vue({
	el:'#userApp',

	data:{
		filter:'',
		users:[]
	},
	ready:function(){
		this.loadUsers();
	},

	methods:{
		loadUsers:function(){
			this.$http.get('/admin/users', function (users){
			          this.$set('users', users)
			});
		},
		
		disableUser:function(user){
			if (confirm('您确定停用该用户吗？')){
				this.changeUserState(user,'disable');		
			}
		},
		enableUser:function(user){
			this.changeUserState(user,'enable');
		},
		changeUserState:function(user,state){
			var idx = this.users.indexOf(user);
			this.$http.get('/admin/users/'+ user.id + '/' + state, function (user){
			       this.users.$set(idx,user);
			});		
		},
		deleteUser:function(user){
			if  (confirm('删除不可恢复，您确定要删掉该用户吗?')){
				this.users.$remove(user);
				this.$http.delete('/admin/users/'+user.id);	
			}
		}
	}
});