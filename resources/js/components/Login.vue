<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input v-model="form.email" id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input v-model="form.password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary" @click.prevent="store">Login</button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios'; 
    
    export default {
        components: {},
        data: () => ({
            form: {
                email: "",
                password: ""
            },
            loading: false,
            error: false,
        }),
        mounted() {
        },
        methods: {
           
            store() {
                this.loading = true;
                axios.post('/api/login', this.form)
                .then(res => {
                    if (res.data.success) {
                        Swal.fire({
                            title: res.data.message,
                            text: "",
                            showCancelButton: false,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                                this.$router.push('profile');
                            }) 
                        console.log('Success');
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
        }
    }
</script>
