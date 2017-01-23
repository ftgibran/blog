<template>
    <div>

        <div id="register" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-title text-center">
                        <img src="/images/logo.png" alt="Clash Of Nerds" style="width: 240px">
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <h5>Para acessar esse conteúdo, preencha os campos abaixo</h5>

                                <form @submit.prevent="storeGuest">

                                    <input type="hidden" name="tipo" value="1">
                                    <div class="form-group">
                                        <div class="input-field">
                                            <label for="email">Nome</label>
                                            <input id="nome" v-model="name" name="nome" type="text" class="form-control"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-field">
                                            <label for="email">E-mail</label>
                                            <input id="email" v-model="email" name="email" type="email"
                                                   class="form-control"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <button class="btn btn-large btn-success">Enviar</button>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </div>

</template>

<script>
    import {default as toastr} from 'toastr/build/toastr.min.js'
    import toastrConfig from '../../config/toastr'

    export default {
        props: {},
        data() {
            return {
                name: '',
                email: ''
            }
        },
        mounted() {
            this.$http.get('/api/checkip/guest', {})
                    .then((guest) => {
                        //Se o usuário já estiver registrado, não encher o saco dele
                        if (!guest.data.registered) {
                            $('#register').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                        }
                    });
        },
        methods: {
            storeGuest() {
                const data = {
                    name: this.name,
                    email: this.email
                };

                this.$http.post('/api/guests', data)
                        .then((response) => {
                            toastr.success('Feito!');
                            $('#register').modal('hide');
                        })
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss" scoped>
</style>
