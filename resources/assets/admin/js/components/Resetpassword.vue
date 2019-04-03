<template>
    <div>
        <div class="card">
            <div class="card-header personal">
                <div class="h5 text-default">Redefinir Senha</div>
            </div>

            <div class="card-body">       
                <form id="formResetPassword" method="POST" action="/password/reset" class="needs-validation" :class="error" novalidate>
                    <input type="hidden" name="_token" v-bind:value="csrf">
                    <div class="form-group">
                        <label for="email" class="text-default">E-mail</label>
                        <input type="text" class="form-control" v-model="email" name="email" id="email" aria-describedby="emailHelp" required  autofocus>
                        <div class="valid-feedback" :class="errorFeedback.email">{{errorMsg.email}}</div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-default">Senha</label>
                        <input type="password" class="form-control" v-model="password" name="password" id="password" aria-describedby="emailHelp" required>
                        <div class="valid-feedback" :class="errorFeedback.password">{{errorMsg.password}}</div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="text-default">Confirmar Senha</label>
                        <input type="password" class="form-control" v-model="confirmpassword" name="password_confirmation" id="password-confirm" aria-describedby="emailHelp" required  autofocus>
                        <div class="valid-feedback" ></div>
                    </div>
                                
                    <button type="submit" @click.prevent="validar()" class="btn btn-secondary">Redefinir</button>

                </form>
                                        
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        props: ['csrf'],
        data(){
            return{
                email: '',
                password: '',
                confirmpassword: '',
                error: '',
                errorFeedback: {
                    email: '',
                    password: ''
                },
                errorMsg: {
                    email: '',
                    password: ''
                }
            }
        },
        methods:{
        validar(){
            if(this.email === '' || this.password === '' || this.confirmpassword === ''){

                this.error = 'was-validated';
                return false;
            }else if(!this.validEmail(this.email)){

                this.error = 'was-validated';
                this.email = '';
                this.errorFeedback.email = 'invalid-feedback';
                this.errorMsg.email = 'Informe um e-mail válido!';
            }else if(this.password !== this.confirmpassword){

                this.error = 'was-validated';
                this.errorFeedback.password = 'invalid-feedback';
                this.errorMsg.password = 'As senhas não conferem!';
            }else{

                this.error = '';
                this.email = '';
                this.errorFeedback.email = '';
                this.errorMsg.email = '';
                this.errorFeedback.password = '';
                this.errorMsg.password = '';

                jQuery("#formResetPassword").submit()
            }
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        }
    }
</script>
