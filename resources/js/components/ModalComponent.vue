<template>
    <div>
        <b-button size="sm" @click="toggle">
            {{ show ? 'Hide' : 'Show' }} Alert
        </b-button>
        <b-alert
            v-model="show"
            class="mt-3"
            dismissible
            @dismissed="dismissed"
        >
            Hello {{ name }}!
        </b-alert>
    </div>
</template>

<script>
export default {
name: "ModalComponent"
    data() {
        return {
            name: 'BootstrapVue',
            show: true
        }
    },
    watch: {
        show(newVal) {
            console.log('Alert is now ' + (newVal ? 'visible' : 'hidden'))
        }
    },
    methods: {
        toggle() {
            console.log('Toggle button clicked')
            this.show = !this.show
        },
        dismissed() {
            console.log('Alert dismissed')
        }
    }
}
</script>

<style scoped>

</style>
