var Vue = require('vue');
Vue.use(require('vue-resource'));

var token = $('meta[name="csrf-token"]').attr('content');
Vue.http.headers.common['X-CSRF-TOKEN'] = token;


new Vue({
	el:'#areaApp',

	data:{
		areas:[],
		area:null,
		areaForm:null
	},
	ready:function(){
		this.loadDicts();
	},
	components:{
		'area-list':require('./components/area-list.vue'),
		'area-form':require('./components/area-form.vue')
	},	
	methods:{
		loadDicts:function(){
			this.$http.get('/admin/areas',function(areas){
				this.$set('areas',areas);
			})
		},
		selectArea:function(area){
			if (!area.children){
				this.$http.get('/admin/areas/' + area.id + '/children',function(areas){
					area.$set('children',areas);
				});	
			}

			this.area = area;
			this.areaForm = $.extend({},area);
			this.parent = null;
			this.$broadcast('area-selected',area);
		},
		copyArea:function(src,tgt){
			tgt.names = src.names;
			tgt.names_en = src.names_en;
			tgt.sort = src.sort;
		},
		saveArea:function(area){
			if (area.id = -1){
				this.$http.post('/admin/areas',area,function(saved){
					if (this.parent){
						this.parent.children.push(saved);
					}else{
						this.areas.push(saved);
					}
					this.areaForm = null;
					this.area = null;
				});	
			}else{
				this.$http.put('/admin/areas/'+area.id,area);	
				this.copyArea(area,this.area);
			}
			
		},
		removeArea:function(areas,area){
			for(var i in areas){
				var a = areas[i];
				if (a.id == area.id) {
					areas.$remove(a);
					return;
				}
				if (a.children){
					this.removeArea(a.children,area);
				}
			}
		},
		
		deleteArea:function(area){
			this.removeArea(this.areas,area);
			this.$http.delete('/admin/areas/' + area.id);
			this.area = null;
			this.areaForm = null;
		},
		addChild:function(area){
			this.parent = area;
			area.children = area.children||[];
			var child = {id:-1,pid:area.id,names:'',names_en:'',sort:1};
			this.area = child;
			this.areaForm = $.extend({},child);
		},
		addRootArea:function(){
			this.parent = null;
			var area = {id:-1,pid:null,names:'',names_en:'',sort:99,levels:1};
			this.area = area;
			this.areaForm = $.extend({},area);	
		}


	}
});