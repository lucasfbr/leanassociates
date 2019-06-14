<template>
    <div>
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="mb-4 text-secondary">Publique seus projetos</h3>
            <div id="fase1" v-if="fase1">
                <h5 class="mb-3 text-secondary">Quais seus problemas? Queremos soluciona-los para você</h5>
                <p class="text-secondary">Ao selecionar uma categoria para seu projeto, poderemos encaminha-lo ao consultor mais indicado</p>
            </div>

            <div id="fase2" v-if="fase2">
                <h5 class="mb-3 text-secondary">Quais seus problemas? Queremos soluciona-los para você</h5>
                <p class="text-secondary">Ao selecionar uma categoria para seu projeto, poderemos encaminha-lo ao consultor mais indicado</p>
            </div>

            <div id="fase3" v-if="fase3">
                <h5 class="mb-3 text-secondary">Quais seus problemas? Queremos soluciona-los para você</h5>
                <p class="text-secondary">Ao selecionar uma categoria para seu projeto, poderemos encaminha-lo ao consultor mais indicado</p>
            </div>
            <button class="btn btn-secondary" @click=voltarFase()>Voltar</button>
            <button class="btn btn-secondary" @click="avancarFase()">Próximo</button>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //console.log('Component mounted.')
        },
        props:[],
        data(){
            return{
                cont: 1,
                fase1: true,
                fase2: false,
                fase3: false,
            }
        },
        methods:{

            avancarFase(){

                if(this.cont > 0 && this.cont < 3) {

                    this.cont = this.cont + 1;

                    alert('fase' + this.cont)
                }

            },
            voltarFase(){

                if(this.cont > 1 && this.cont < 4) {

                    this.cont = this.cont - 1;

                    alert('fase' + this.cont)
                }
                
            }

        }
    }
</script>
