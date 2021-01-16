<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        User Name: <input v-model="info.name" type="text" name="userName" id="userName" class="form-control" readonly>
                    </div>
                    
                    <button class="btn btn-success" @click.prevent="logout">Sign out</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'; 
    
    export default {
        data: () => ({
            info: {},
        }),
        mounted() {
            this.loadTodos(); 
        },
        methods: {
           loadTodos() {
                axios.get('/api/userInfo/')
                .then(res => {
                    this.info = res.data.data;
                })
            },
            logout() {
                axios.get('/api/logout')
                .then(res => {
                    if (res.data.success) {
                        Swal.fire({
                            title: res.data.message,
                            text: "",
                            showCancelButton: false,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                                this.$router.push('login');
                            }) 
                    }
                    else {
                        Swal.fire({
                            title: res.data.message,
                            text: "",
                            showCancelButton: false,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            });
                    }
                })
            }
            
        },
    }
</script>
