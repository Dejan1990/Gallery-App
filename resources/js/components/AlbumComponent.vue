<template>
    <div>
        <form @submit.prevent="createAlbum" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name of Album</label>
				<input type="text" name="name" v-model="name" class="form-control" maxlength="15">
			</div>
			<div class="form-group">
				<label>Description of Album</label>
				<textarea class="form-control"  maxlength="200" name="description" v-model="description"></textarea>
			</div>
			<div class="form-group">
				<label>Category of Album</label>
				<select class="form-control" name="category" v-model="category">
                    <option 
                        v-for="(category,index) in categories" 
                        :key="index" 
                        :value="category.id"
                    >
                        {{category.name}}
                    </option>
				</select>
			</div>
			<div class="form-group">
				<label>Image of Album</label>
				<input type="file" name="image" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-secondary" type="submit">Create Album</button>
			</div>
		</form>
    </div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return{
				name:'',
				description:'',
				category:'',
				image:'',
				categories:[],
			}
		},
		created(){
			this.getCategories()
		},
		methods:{
			getCategories(){
				axios.get('/api/categories').then((response)=>{
					this.categories = response.data
				}).catch((error)=>{
					alert('unable to fetch categories')
				})
			},
            createAlbum() {
                alert('Ok')
            }
		}
	}
</script>
<style type="text/css">
	.danger{
		color: red;
	}
</style>
