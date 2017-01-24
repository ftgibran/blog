<template>
    <div class="row">
        <vue-table :title="$t('page.promoDarthVader')" :fields="fields" api-url="/api/promos/dv" show-paginate>
            <div slot="buttons">
                <h5>Total: {{total}}</h5>
            </div>
        </vue-table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                total: 0,
                fields: [
                    {
                        name: 'id',
                        trans: 'table.id',
                        titleClass: 'width-5-percent text-center',
                        dataClass: 'text-center'
                    },
                    {
                        name: 'name',
                        trans: 'table.username'
                    },
                    {
                        name: 'email',
                        trans: 'table.email'
                    },
                    {
                        name: 'message',
                        trans: 'table.message'
                    },
                    {
                        name: 'ip',
                        trans: 'table.ip'
                    },
                    {
                        name: 'created_at',
                        trans: 'table.created_at'
                    }
                ]
            }
        },
        methods: {},
        mounted() {
            this.$http.get('/api/promos/count/2', {})
                    .then(response => {
                        this.total = response.data.count;
                    });
        }
    }
</script>

<style lang="sass">
</style>
