<template>
    <div>
        <div class="card">
            <div class="card-header personal">
                <div class="h5 text-default">Redefinir Senha</div>
            </div>

            <div class="card-body">       
                <form id="formLogin" method="POST" action="/password/reset" class="needs-validation" novalidate>
                            
                    <div class="form-group">
                        <label for="email" class="text-default">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" required  autofocus>
                        <div class="valid-feedback" ></div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-default">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" required>
                        <div class="valid-feedback" ></div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="text-default">Confirmar Senha</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" aria-describedby="emailHelp" required  autofocus>
                        <div class="valid-feedback" ></div>
                    </div>
                                
                    <button type="submit" class="btn btn-secondary">Redefinir</button>

                </form>
                                        
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
