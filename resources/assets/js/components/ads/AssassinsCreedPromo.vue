<template>

    <div id="assassins-creed-promo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-title">
                    <img src="/images/logo.png" alt="Clash Of Nerds" style="width: 240px">
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6" style="padding: 2em;">
                            <img src="/images/Funko-Assassins-Creed.png" class="img-responsive" alt="">
                        </div>

                        <div class="col-md-6" style="padding: 2em;">

                            <form style="margin-top: 30px;"
                                  @submit.prevent="storeGuest">

                                <input type="hidden" name="tipo" value="1">
                                <div class="form-group">
                                    <h4 style="color: #d5b275">Envie a sua frase e concorra a um Funko Pop do
                                        Assassin's Creed!</h4>
                                    <p style="color: #898989">Escreva uma frase explicando <b>porque você
                                        merece ser ganhador dessa competição</b> até às 23:59 do dia 25/01. A
                                        melhor frase será selecionada e o ganhador será contatado na próxima
                                        segunda, dia 29/01 para informar o endereço de entrega <span
                                                style="font-size: 10px">(entregamos em todo Brasil)</span></p>

                                    <div class="input-field col s12">
                                        <label for="email">Nome Completo *</label>
                                        <input id="nome" v-model="name" name="nome" type="text" class="form-control"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-field col s12">
                                        <label for="email">E-mail *</label>
                                        <input id="email" v-model="email" name="email" type="email" class="form-control"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-field col s12">
                                        <label for="textarea1">Porque você merece ser ganhador dessa competição
                                            * (140 caracteres)</label>
                                        <textarea id="textarea1" v-model="message" name="frase"
                                                  class="form-control"
                                                  required maxlength="140"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col s12 center">
                                        <button class="btn btn-success">Participar
                                        </button>
                                    </div>
                                </div>

                            </form>

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
        props: {
            content: {
                type: Object,
                default() {
                    return null
                }
            }
        },
        data() {
            return {
                name: '',
                email: '',
                message: ''
            }
        },
        mounted() {
            this.$http.get('/api/checkip', {})
                    .then((response) => {
                        if (!response.data.registered) {
                            $('#assassins-creed-promo').modal('show');
                        }
                    })
        },
        methods: {
            storeGuest() {
                const data = {
                    name: this.name,
                    email: this.email
                };

                this.$http.post('/api/guests', data)
                        .then((response) => {
                            toastr.success('Parabéns! A partir de agora você está concorrendo!');
                            $('#assassins-creed-promo').modal('hide');
                        })
            },
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss" scoped>
</style>
