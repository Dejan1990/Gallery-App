<template>
	<div>
		<table class="table table-image">
			<thead>
				<tr>
					<th scope="col">SN</th>
					<th scope="col">Image</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">Category</th>
					<th scope="col">View</th>
					<th scope="col">Upload</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
			<tr v-for="(album, index) in albums" :key="index">
		      <th scope="row">{{ index + 1 }}</th>
		        <td class="w-25">
			      <img  :src="'/album/'+ album.image" class="img-fluid img-thumbnail" alt="Sheep">
		        </td>
		        <td>{{ album.name }}<a href="" ></a></td>
		        <td>{{ album.description }}</td>
		        <td>{{ album.category.name }}</td>
		        <td>
		        	<a href="#">
		        		<button class="btn btn-info">
		        			View
		        		</button>
		        	</a>
		        </td>
		        <td>
		        	<a href="#">
		        		<button class="btn btn-success">Upload</button>
                    </a>
		        </td>
		        <td>
		      		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 					 Edit
			    	</button>
		        </td>
		        <td>
		        	<button class="btn btn-danger">Delete</button>
		        </td>
		    </tr>
			</tbody>
		</table>
	</div>
</template>


<script type="text/javascript">
	export default{
		data(){
			return{
				albums:[]
			}
		},
		created(){
			axios.get('/getalbums').then((response) => {
                this.albums = response.data
            }).catch((error) => {
                console.log(error);
            })
		},
	}
</script>