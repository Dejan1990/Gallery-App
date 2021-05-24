<template>
    <div>
        <form enctype="multipart/form-data">
			<div class="form-group">
				<label>Name of Album</label>
				<input type="text" name="name" class="form-control" maxlength="15">
			</div>
			<div class="form-group">
				<label>Description of Album</label>
				<textarea class="form-control"  maxlength="200" name="description"></textarea>
			</div>
			<div class="form-group">
				<label>Category of Album</label>
				<select class="form-control" name="category">
                    <option value=""></option>
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
<script>
export default {
    
}
</script>