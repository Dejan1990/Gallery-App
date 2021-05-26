<template>
<div>
    <button class="btn btn-primary ml-4" @click.prevent="followUser" v-text="buttonText"></button>
</div>
</template>

<script>
export default {
    props: ['userId', 'follows'],
    data() {
        return {
            status: this.follows // vraca true or false
        }
    },
    methods: {
        followUser() {
            axios.post('/follow', {
                userId: this.userId
            }).then(response => {
                this.status = !this.status //menjamo status
            }).catch(error => {
                alert('error')
            })
        }
    },

    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>
