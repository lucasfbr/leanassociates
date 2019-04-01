<template>
    <div>
        <div class="card">
                <div class="card-header personal">
                    <div class="h5 text-default">Cadastro</div>
                </div>

                <div class="card-body">       
                    <form id="formLogin" method="POST" action="/login" class="needs-validation" novalidate>
                       
                        <div class="form-group">
                            <label for="name" class="text-default">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required  autofocus>
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-default">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                            <div class=""></div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-default">Senha</label>
                            <input type="text" class="form-control" name="password" id="password" required>
                            <div class=""></div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="text-default">Confirme a senha</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                            <div class=""></div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Cadastrar</button>

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
