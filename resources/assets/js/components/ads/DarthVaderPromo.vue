<template>
    <div>

        <div id="darth-vader-promo" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="modal-title text-center">
                            <img src="/images/logo.png" alt="Clash Of Nerds" style="width: 240px">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6" style="padding: 0 2em;">
                                <img src="/images/darth-vader-choke-pop.png" class="img-responsive" alt="">
                            </div>

                            <div class="col-md-6" style="padding: 0 2em;">

                                <form @submit.prevent="storeGuest">

                                    <input type="hidden" name="tipo" value="1">
                                    <div class="form-group">
                                        <h4 style="color: #d5b275">Envie a sua frase e concorra a um Funko Pop do
                                            Darth Vader!</h4>
                                        <p style="color: #898989">Escreva uma frase explicando <b>porque você
                                            merece ser ganhador dessa competição</b> até às 23:59 do dia 27/01. A
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
                                            <input id="email" v-model="email" name="email" type="email"
                                                   class="form-control"
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

        <ad-corner-box ref="adBox" :visible="false" title="Concorra a um Funko Pop do Darth Vader!">
            <a href="/concurso/darth-vader">
                <img src="/images/darth-vader-choke-pop.png" class="img-responsive" alt="">
            </a>
            <p>
                Saiba mais <a style="color: #d5b275" href="/concurso/darth-vader">clicando aqui</a>
            </p>
        </ad-corner-box>

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
                message: '',
                promo_id: 2
            }
        },
        mounted() {
            this.$http.get('/api/checkip/promo?promo_id=' + this.promo_id, {})
                    .then((promo) => {

                        //Se o usuário já estiver participando, não enche o saco dele
                        if (!promo.data.registered) {
                            this.$http.get('/api/checkip/visited', {})
                                    .then((visited) => {
                                        //Se o usuário nunca entrou no site, mostrar o modal
                                        if (!visited.data.registered) {
                                            $('#darth-vader-promo').modal('show');
                                        } else {
                                            //Caso o contrario, mostra a box ad
                                            this.$refs.adBox.ad = true;
                                        }
                                    });
                        }

                    });
        },
        methods: {
            storeGuest() {
                const data = {
                    promo_id: this.promo_id,
                    name: this.name,
                    email: this.email,
                    message: this.message
                };

                this.$http.post('/api/promos', data)
                        .then((response) => {
                            toastr.success('Parabéns! A partir de agora você está concorrendo!');
                            $('#darth-vader-promo').modal('hide');
                        })
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss" scoped>
</style>
