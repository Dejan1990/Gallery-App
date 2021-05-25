<template>
<div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group files text-center" ref="fileform">
            <input type="file" ref="file" multiple="multiple">
            <span id="val"></span>
            <a class="btn btn-secondary" @click.prevent="submitFiles()">Upload</a>
        </div>
    </form>
</div>
</template>

<script>
export default {
    data() {
        return {
            album_id: 1
        }
    },
    methods: {
        submitFiles() {
            const config = {
                headers: {
                    "content-type": "multipart/form-data"
                }
            }
            let formData = new FormData();
            for (var i = 0; i < this.$refs.file.files.length; i++) { //this.$refs.file.files.length gives total length of images
                let file = this.$refs.file.files[i];
                formData.append('files[' + i + ']', file);
                formData.append('album_id', this.album_id)
            }
            this.uploading = true;
            this.$refs.file.value = ''
            axios.post('/uploadImages', formData, config).then((response) => {

            })
        },
    },
}
</script>
