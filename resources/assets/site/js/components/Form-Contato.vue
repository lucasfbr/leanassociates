<template>
    <div class="container">
        <h2 class="text-center">Entre em contato</h2>

        <div class="alert alert-dismissible fade show" :class="{'alert-success' : alertTipo === true, 'alert-danger' : alertTipo === false}" v-if="alertShow" role="alert">
           {{alertMsg}}
        </div>

        <form class="needs-validation" :class="{'was-validated':validationError}" novalidate>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" id="empresa" required="" v-model="contato.empresa">
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" required="" v-model="contato.nome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" required="" v-model="contato.email">
                        <div class="" :class="{'invalid-feedback':msgError.status}">{{msgError.email}}</div>
                    </div>
                    <div class="form-group">
                        <label for="fone">Telefone</label>
                        <input type="text" class="form-control" id="fone" required="" v-model="contato.fone">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea class="form-control" id="mensagem" required="" v-model="contato.mensagem" @keyup="contador" rows="11"></textarea>
                        <p>{{caracteres}} / 300</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <button @click.prevent="validar" class="btn btn-success btn-banner btn-form-contato">Envie sua mensagem</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component index mounted.')
        },
        data(){
            return{
                contato: {
                    empresa: '',
                    nome: '',
                    email: '',
                    fone: '',
                    mensagem: ''

                },
                msgError:{
                    status: false,
                    email: '',
                },
                validationError: false,
                caracteres: 300,
                alertShow: false,
                alertTipo: false,
                alertMsg: ''



            }
        },
        methods:{
            validar(){

                if(this.contato.empresa === '' || this.contato.nome === '' || this.contato.email === '' || this.contato.fone === '' || this.contato.mensagem === ''){
                    this.validationError = true

                    return false;
                }

                if(!this.validEmail(this.contato.email)){

                    this.contato.email = '';
                    this.msgError.status = true;
                    this.msgError.email = 'Informe um e-mail válido.';
                }

                this.enviarEmail();


            },
            validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
            contador(){

                this.caracteres > 0 ? this.caracteres -= 1 : '';
                this.contato.mensagem = this.contato.mensagem.substring(0,300);

            },
            enviarEmail(){

                this.$http.post('/api/contato/registrar', this.contato).then(response => {

                    //console.log(response.body);

                    if(response.body.status === 200){
                        this.alertShow = true;
                        this.alertTipo = true;
                        this.alertMsg = 'Parabéns! Sua mensagem foi enviada com sucesso';
                    }else{
                        this.alertShow = true;
                        this.alertMsg = 'Erro! Sua mensagem não foi enviada, tente novamente mais tarde.';
                    }

                    this.limparForm();

                }, response => {

                    console.log('erro!!!!!!')

                });
            },
            limparForm(){
                this.contato.empresa = '';
                this.contato.nome = '';
                this.contato.email = '';
                this.contato.fone = '';
                this.contato.mensagem = '';
                this.caracteres = 300;
                this.validationError = false;
            }
        }
    }
</script>
