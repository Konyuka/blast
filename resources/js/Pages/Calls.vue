<template>
    <karibu-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="h-screen">
              <!-- <iframe :src='iframe' id="iframe" width="100%" height="100%" title="File details"></iframe> -->
              <iframe src = "http://192.168.100.19/" width="1003" height="665" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>



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
