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
                    <div class="h5 text-default">Cadastro</div>
                </div>

                <div class="card-body">       
                    <form id="formRegister" method="POST" action="/register" class="needs-validation" :class="error" novalidate>
                        <input type="hidden" name="_token" v-bind:value="csrf">
                        <div class="form-group">
                            <label for="name" class="text-default">Nome</label>
                            <input type="text" class="form-control" v-model="dados.name" name="name" id="name" aria-describedby="emailHelp" required  autofocus>
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-default">Email</label>
                            <input type="text" class="form-control" v-model="dados.email" name="email" id="email" required>
                            <div class="" :class="dados.emailFeedback">{{dados.emailMsg}}</div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-default">Senha</label>
                            <input type="password" class="form-control" v-model="dados.password" name="password" id="password" required>
                            <div class="" :class="dados.passwordFeedback">{{dados.passwordMsg}}</div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="text-default">Confirme a senha</label>
                            <input type="password" class="form-control" v-model="dados.passwordConfirmation" name="password_confirmation" id="password-confirm" required>
                            <div class=""></div>
                        </div>
                        <button type="submit" @click.prevent="validar()" class="btn btn-secondary">Cadastrar</button>

                    </form>                                
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            if(this.emailerror === 'The email has already been taken.'){
                
                this.alert.status = 'show';
                this.alert.msg = 'O e-mail informado já existe!';
            }


        },
        props: ['csrf','emailerror'],
        data(){
            return{
                dados: {
                    name: '',
                    email: '',
                    emailMsg: '',
                    emailFeedback: '',
                    password: '',
                    passwordConfirmation: '',
                    paswordMsg: '',
                    passwordFeedback: ''
                },
                error: '',
                alert:{
                    status: 'fade',
                    msg: ''
                }   
            }
        },
        methods:{
            validar(){

                if(this.dados.name === '' || this.dados.email === '' || this.dados.password === '' || this.dados.passwordConfirmation === ''){

                    this.error = 'was-validated';

                    return false;
                }else if(!this.validEmail(this.dados.email)){

                    this.error = 'was-validated';
                    this.dados.emailFeedback = 'invalid-feedback';
                    this.dados.emailMsg = 'Informe um email válido!';

                    this.dados.email = '';

                }else if(this.dados.password !== this.dados.passwordConfirmation){

                    this.error = 'was-validated';
                    this.dados.passwordFeedback = 'invalid-feedback';
                    this.dados.passwordMsg = 'As senhas informadsa não conferem!';

                    this.dados.password = '';
                    this.dados.passwordConfirmation = '';

                }else if(this.dados.password.length < 6){

                    this.error = 'was-validated';
                    this.dados.passwordFeedback = 'invalid-feedback';
                    this.dados.passwordMsg = 'A senha deve ter no minimo 6 caracteres';

                    this.dados.password = '';
                    this.dados.passwordConfirmation = '';

                }
                else{

                    this.error = '';
                    jQuery("#formRegister").submit()

                }

            },
            validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
        }

    }
</script>