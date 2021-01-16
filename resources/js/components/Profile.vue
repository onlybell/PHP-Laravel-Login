<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        I'm an login component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'; 
    
    export default {
        mounted() {
            this.loadTodos();
        },
        methods: {
           loadTodos() {
                axios.get('/api/userInfo/')
                .then(res => {
                    console.log('========> ' + res.data.data);

                    // this.todo = res.data.data;
                    // setTimeout(() => { 
                    //     this.loading = false;
                    // }, 500)
                })
            },
            
        },
    }
</script>
