<template>
    
    <div>
        <div class="card">
                <div class="card-header personal">
                    <div class="h5 text-default">Confirme seu e-mail</div>
                </div>

                <div class="card-body">       
                    <form id="formLogin" method="POST" action="/password/email" class="needs-validation" :class="errorValidate" novalidate>
                        <input type="hidden" name="_token" v-bind:value="csrf">
                        <div class="form-group">
                            <label for="email" class="text-default">E-mail</label>
                            <input type="text" class="form-control" v-model="email" name="email" id="email" aria-describedby="emailHelp" required  autofocus>
                            <div class="valid-feedback" :class="errorFeedback">{{errorMsg}}</div>
                        </div>
                        
                        <button type="submit" @click.prevent="validar()" class="btn btn-secondary">Enviar nova senha</button>

                    </form>
                                
                </div>
            </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['csrf'],
        data(){
            return{
                email: '',
                errorValidate: '',
                errorFeedback: '',
                errorMsg: ''
            }
        },
        methods:{
            validar(){
                if(this.email === ''){

                    this.errorValidate = 'was-validated';
                    return false;

                }else if(!this.validEmail(this.email)){
                    this.errorValidate = 'was-validated';
                    this.email = '';
                    this.errorFeedback = 'invalid-feedback';
                    this.errorMsg = 'Informe um e-mail válido!';
                }else{

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
