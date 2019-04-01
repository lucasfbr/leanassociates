<template>
    
    <div>
        <div class="card">
                <div class="card-header personal">
                    <div class="h5 text-default">Confirme seu e-mail</div>
                </div>

                <div class="card-body">       
                    <form id="formLogin" method="POST" action="/password/email" class="needs-validation" novalidate>
                        <input type="hidden" name="_token" v-bind:value="csrf">
                        <div class="form-group">
                            <label for="email" class="text-default">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" required  autofocus>
                            <div class="valid-feedback" ></div>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary">Enviar nova senha</button>

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
        props: ['csrf']
    }
</script>
