var Vue = require('vue');
Vue.use(require('vue-resource'));

var token = $('meta[name="csrf-token"]').attr('content');
Vue.http.headers.common['X-CSRF-TOKEN'] = token;

new Vue({
	el:'#dictApp',

	data:{
		filter:'',
		dict:{},
		edict:{},
		edit:false,
		dicts:[],
		dictIndex:-1,
		item:{},
		itemIndex:-1,
		items:[],
		itemEdit:false
	},
	ready:function(){
		this.loadDicts();
	},	
	components:{
		'dict-list':require('./components/dict-list.vue'),
		'dict-form':require('./components/dict-form.vue'),
		'dictitem-list':require('./components/dictitem-list.vue'),
		'dictitem-form':require('./components/dictitem-form.vue')
	},
	methods:{
		loadDicts:function(){
			this.$http.get('/admin/dicts', function (dicts){
			          this.$set('dicts', dicts)
			});
		},

		addDict:function(){
			this.edict = {code:'',name:''};
			this.dictIndex = -1;
			this.edit = true;
		},
		
		saveDict:function(dict){
			if (this.dictIndex>=0){
				this.dicts.$set(this.dictIndex,dict);
				this.$http.put('/admin/dicts/'+dict.id,dict);
			}else{
				this.$http.post('/admin/dicts',dict,function(saved){
					this.dicts.push(saved);
					this.dict = saved;
					this.$broadcast('dict-added',saved);
				});
				
			}
			this.dict = dict;

		},
		editDict:function(dict){
			this.dictIndex = this.dicts.indexOf(dict);
			this.edict = $.extend({},dict);
			this.edit = true;
		},
		deleteDict:function(dict){
			if (confirm('您确定删掉这个字典吗 ?')){
				this.dicts.$remove(dict);
				this.$http.delete('/admin/dicts/'+dict.id);
				this.dict = {};
				this.dictIndex = -1;
			}
		},
		selectDict:function(dict){
			this.dict = dict;
			this.dictIndex = this.dicts.indexOf(dict);
			this.$http.get('/admin/dicts/'+dict.id + '/items',function(items){
					this.$set('items', items);
			});
		},

		addItem:function(){
			this.item = {name:'',value:'',orders:this.items.length+1};
			this.itemIndex = -1;
			this.itemEdit = true;
		},
		editItem:function(item){
			this.itemIndex = this.items.indexOf(item);
			this.item = Vue.util.extend({},item);
			this.itemEdit = true;
		},
		saveItem:function(item){
			if (this.itemIndex>=0){
				this.items.$set(this.itemIndex,item);
				this.$http.put('/admin/dicts/items/'+item.id,item);
			}else{
				
				this.$http.post('/admin/dicts/items?dictId='+this.dict.id,item,function(saved){
					this.items.push(saved);
				});
			}
			this.item = {};
		},
		deleteItem:function(item){
			if (confirm('您确定删除这条数据吗 ?')){
				this.items.$remove(item);
				this.$http.delete('/admin/dicts/items/'+item.id);
			}
		},
	}
});

