<template>
<div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group files text-center" ref="fileform">
            <input type="file" ref="file" multiple="multiple">
            <span id="val"></span>
            <a class="btn btn-secondary" @click.prevent="submitFiles()">Upload</a>
        </div>
    </form>
    <progress max="100" style="width: 100%;" :value.prop="uploadPercentage" v-if="uploading"></progress>
</div>
</template>

<script>
export default {
    props:['album_id'],
    data() {
        return {
            uploadPercentage: '',
			uploading: false,
        }
    },
    methods: {
        submitFiles() {
            let formData = new FormData();
            for (var i = 0; i < this.$refs.file.files.length; i++) { //this.$refs.file.files.length gives total length of images
                let file = this.$refs.file.files[i];
                formData.append('files[' + i + ']', file);
                formData.append('album_id', this.album_id)
            }
            this.uploading = true;
            this.$refs.file.value = ''
            axios.post('/uploadImages', formData, {
                headers: {
                    "content-type": "multipart/form-data"
                },
                onUploadProgress:function(progressEvent){
					this.uploadPercentage = parseInt(Math.round((progressEvent.loaded*100)/progressEvent.total));
				}.bind(this)

            }).then((response) => {

            })
        },
    },
}
</script>
