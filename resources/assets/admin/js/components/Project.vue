<template>
    <div>
        <h1 class="mb-4 text-secondary">Publique seu projeto</h1>
        <transition name="slide-fase1">
            <div id="fase1" v-if="fase1" class="mb-5">
                <h3 class="mb-4 text-secondary">Quais seus problemas? Queremos soluciona-los para você</h3>
                <p class="text-secondary mb-5">Ao selecionar uma categoria para seu projeto, poderemos encaminha-lo ao consultor mais indicado</p>
                <div class="row mb-5 text-secondary">
                    <div class="col-sm-3" v-for="cat in categorias">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{cat.titulo}}</h5>
                                <div class="custom-control custom-radio categoria1">
                                    <input type="radio" :id="'cat_'+cat.id" name="categoria" v-model="catSelecionada" class="custom-control-input" :value="cat.id">
                                    <label class="custom-control-label" :for="'cat_'+cat.id"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>

        <transition name="slide-fase2">
            <div id="fase2" v-if="fase2" class="mb-5">
                <h3 class="mb-3 text-secondary">Nome do projeto</h3>
                <p class="text-secondary">O título vai orientar nossa equipe, assim poderemos lhe indicar o melhor profissional</p>
                <input type="text" class="form-control form-control-lg" id="titulo" name="titulo" v-model="titulo" placeholder="Por exemplo: Consultoria Finânceira">
            </div>
        </transition>

        <transition name="slide-fase3">
            <div id="fase3" v-if="fase3" class="mb-5">
                <h3 class="mb-3 text-secondary">Orçamento disponível para o projeto</h3>
                <p class="text-secondary">O orçamento vai ajudar os consultores a entenderem as dimensões do projeto</p>
                <select class="form-control form-control-lg" name="valor" v-model="valor">
                    <option value="R$5.000 - 10.000">R$5.000 - 10.000</option>
                    <option value="R$10.000 - 20.000">R$10.000 - 20.000</option>
                    <option value="R$20.000 - 40.000">R$20.000 - 40.000</option>
                    <option value="R$40.000 - 80.000">R$40.000 - 80.000</option>
                    <option value="R$80.000 - 160.000">R$80.000 - 160.000</option>
                </select>
            </div>
        </transition>

        <transition name="slide-fase3">
            <div id="fase4" v-if="fase4" class="mb-5">
                <h3 class="mb-3 text-secondary">Descrição do projeto</h3>
                <p class="text-secondary">Descreva seu projeto com o maior número de datalhes possível</p>
                <textarea class="form-control" id="descricao" name="descricao" v-model="descricao" rows="5"></textarea>
            </div>
        </transition>

        <button class="btn btn-secondary mb-5" v-if="cont > 1" @click="voltarFase()">Voltar</button>
        <button class="btn btn-secondary mb-5" v-if="cont < 4" @click="avancarFase()">Próximo</button>
        <button class="btn btn-success mb-5" v-if="cont == 4" @click="">Salvar</button>
    </div>

</template>

<script>
    export default {
        mounted() {
            this.$http.get('/api/servico').then(response => {

                //console.log(response);
                this.categorias = response.body;
                //console.log(this.categorias);

            }, response => {

                console.log('erro!!!!!!')

            });
        },
        props:[],
        data(){
            return{
                cont: 1,
                fase1: true,
                fase2: false,
                fase3: false,
                fase4:false,
                categorias: [],
                catSelecionada:'',
                titulo: '',
                valor: '',
                descricao: '',
            }
        },
        methods:{
            avancarFase(){

                if(this.validar(this.cont)) {

                    switch (this.cont) {
                        case 1 :
                            this.fase1 = false;
                            this.fase2 = true;
                            this.cont++;
                            break;
                        case 2 :
                            this.fase2 = false;
                            this.fase3 = true;
                            this.cont++;
                            break;
                        case 3 :
                            this.fase3 = false;
                            this.fase4 = true;
                            this.cont++;
                            break;
                    }
                }
            },
            voltarFase(){

                switch (this.cont) {
                    case 1 :
                        break;
                    case 2 :
                        this.fase1 = true;
                        this.fase2 = false;
                        this.cont--;
                        break;
                    case 3 :
                        this.fase2 = true;
                        this.fase3 = false;
                        this.cont--;
                        break;
                    case 4 :
                        this.fase3 = true;
                        this.fase4 = false;
                        this.cont--;
                        break;

                }
            },
            validar(fase){

                if(fase == 1){
                    if(this.catSelecionada == ''){
                        return false;
                    }
                    return true;
                }else if(fase == 2){
                    if(this.titulo == ''){
                        return false;
                    }
                    return true;
                }else if(fase == 3){
                    if(this.valor == ''){
                        return false;
                    }
                    return true;
                }else{
                    if(this.descricao == ''){
                        return false;
                    }
                    return true;
                }


            }
        }
    }
</script>

<style type="text/css">
    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fase1-enter-active, .slide-fase2-enter-active, .slide-fase3-enter-active, .slide-fase4-enter-active{
        transition: all .8s ease;
    }
    .slide-fase1-leave-active, .slide-fase2-leave-active, .slide-fase3-leave-active, .slide-fase4-leave-active {
        transition: all .0s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fase1-enter, .slide-fase1-leave-to, .slide-fase2-enter, .slide-fase2-leave-to, .slide-fase3-enter, .slide-fase3-leave-to, .slide-fase4-enter, .slide-fase4-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }

    #fase1 .custom-control-label {
        cursor: pointer;
    }
</style>