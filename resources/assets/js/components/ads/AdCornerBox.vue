<template>
    <div v-if="ad" id="span-box" class="hidden-xs">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <a class="pull-right badge" @click="closeAd">
                    X
                </a>
                <div class="panel-title">{{title}}</div>

            </div>
            <div class="panel-body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            title: {
                type: String,
                "default": ''
            },
            visible: {
                type: Boolean,
                "default": true
            }
        },
        data() {
            return {
                ad: true
            }
        },
        mounted() {
            this.ad = this.visible;
        },
        methods: {
            closeAd() {
                this.ad = false;
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss" scoped>
    #span-box {
        width: 300px;
        display: block;
        position: fixed;
        right: .5em;
        bottom: .5em;
        z-index: 99;
        .panel {
            box-shadow: 0 0 5px #666;
            margin: 0;
        }
    }
</style>
