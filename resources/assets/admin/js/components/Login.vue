<template>


    <div>
        <div class="alert alert-danger alert-dismissible" :class="alert.status" role="alert">
            {{alert.msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>   

         <div class="card">
            <div class="card-header personal">
                <div class="h5 text-default">Login</div>
            </div>

            <div class="card-body">       
                <form id="formLogin" method="POST" action="/login" class="needs-validation" :class="error" novalidate>
                    <input type="hidden" name="_token" v-bind:value="csrf">
                    <div class="form-group">
                        <label for="email" class="text-default">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" required  autofocus v-model="email">
                        <div class="valid-feedback" :class="{'invalid-feedback':msgError.status}">{{msgError.msg}}</div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-default">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" required v-model="password">
                        <div class=""></div>
                    </div>
                    <button type="submit" @click.prevent="validar($event)" class="btn btn-secondary">Entrar</button>
                    <a href="/password/reset" class="btn btn-link text-secondary">Esqueceu sua senha?</a>

                </form>
                            
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            if(this.emailerror == 1 || this.passworderror == 1){
                this.alert.status = 'show'
                this.alert.msg = 'Usuário ou enha inválidos'
            }
        },
        props: ['csrf','emailerror', 'passworderror'],
        data(){
            return{
                email: '',
                password: '',
                error: '',
                msgError: {
                    status: false,
                    msg: ''
                },
                alert:{
                    status: 'fade',
                    msg: ''
                }   
            }
            
        },
        methods:{
            validar(e){

                if(this.email === '' || this.password === ''){
                    this.error = 'was-validated'

                    return false;

                }else if(!this.validEmail(this.email)){

                    this.error = 'was-validated'

                    this.email = '';
                    this.msgError.status = true;
                    this.msgError.msg = 'Informe um email válido';
                }else{

                     this.error = ''; 
                     this.msgError.status = false;

                     jQuery("#formLogin").submit()

                }

            },
            validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },

        }
    }
</script>
