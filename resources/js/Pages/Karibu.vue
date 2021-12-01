<template>
    <karibu-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <send-message />



    </karibu-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import KaribuLayout from '@/Layouts/KaribuLayout.vue'
    import SendMessage from '@/Components/SendMessage.vue'

    export default defineComponent({
        components: {
            KaribuLayout,
            SendMessage,
        },
        // props: ['response'],
        props: {
            textID: String,
            check: Object,
        },
        setup(props) {
            console.log(props)
        }
    })
</script>
