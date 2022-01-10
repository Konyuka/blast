<template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Send Messages</h1>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="p-4">

                <div class="lg:grid lg:grid-cols-6 lg:gap-x-5">

                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                    <div>
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="country" class="block text-sm font-medium text-gray-700">Choose Platform</label>
                            <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>SMS</option>
                                <option>Email</option>
                                <option>Whatsapp</option>
                                <option>Internal</option>
                            </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="country" class="block text-sm font-medium text-gray-700">Select Sender ID</label>
                            <select v-model="form.senderid" id="country" name="country" autocomplete="country-name" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option v-for="item in senderids" :key="item.sId">{{ item.senderName }}</option>
                            </select>
                            </div>

                            <div class="col-span-3">
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Phone Numbers
                            </label>
                            <div class="mt-1">
                                <textarea v-model="form.mobile" id="about" name="about" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="2547XXXXXXXX, 2547XXXXXXXX, 2547XXXXXXXX"></textarea>
                            </div>

                            <div class="flex justify-between">
                                <div class="flex items-start mt-2">
                                    <div class="h-5 flex items-center">
                                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">Save Batch</label>
                                    </div>
                                </div>

                                <a href="" class="mt-2 text-sm text-indigo-600">
                                    Load Saved Batch
                                </a>
                            </div>

                            </div>

                            <div class="col-span-3">
                            <label class="block text-sm font-medium text-gray-700">
                                Upload from Excel File
                            </label>
                            <div class="mt-1 border-2 border-gray-300 border-dashed rounded-md px-6 pt-4 pb-3 flex justify-center">
                                <div class="space-y-1 text-center">
                                <svg class="mx-auto h-10 w-10 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div></div>
                                <a href="" class="mt-2 text-sm text-indigo-600">
                                    Download the Excel Template
                                </a>
                            </div>
                            </div>

                            <div class="col-span-6">
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Text Message
                            </label>
                            <div class="mt-1">
                                <textarea v-model="form.msg" @input.prevent="checkCharacters" id="about" name="about" rows="6" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Dear Client, This a kind reminder to...."></textarea>
                            </div>
                            <p v-if="characters.remaining.length != 0" class="mt-2 text-sm text-gray-500 flex justify-between">
                                <span><span class="text-red-600">{{characters.remaining}}</span> Characters left for one unit of text</span>
                                <span>Message cost <span class="text-green-600">{{characters.units}} unit(s)</span></span>
                            </p>

                            <div class="flex justify-between">
                                <div class="h-5 flex items-center mt-2">
                                <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <div class="ml-3 text-sm">
                                <label for="comments" class="font-medium text-gray-700">Send WhatsApp</label>
                                </div>
                                </div>

                                <a href="" class="mt-2 text-sm text-indigo-600">
                                    Load an SMS Template
                                </a>

                            </div>

                            </div>


                        </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <!-- <Link :href="route('check')" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Blast
                        </Link> -->
                        <button @click.prevent="sendLaravel"  class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Blast
                        </button>
                        <!-- <button @click.prevent="sendWhatsapp"  class="bg-indigo-600 ml-2 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            WhatsApp
                        </button> -->
                        </div>
                    </div>
                    </div>

                </div>
                </div>

            </div>
            </div>
        </div>
</template>

<script>
    import { defineComponent, onMounted, onUpdated, onUnmounted, computed, watch, reactive, ref } from 'vue'
    import { useForm } from "@inertiajs/inertia-vue3";
    import { Head, Link } from "@inertiajs/inertia-vue3";
    import axios from 'axios';
    import VueResource from 'vue-resource';

    axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';


    // import KaribuLayout from '@/Layouts/KaribuLayout.vue'
    // import sendMessage from '@/Components/Send.vue'

    export default defineComponent({
        components: {
            // KaribuLayout,
            // sendMessage,
            Head,
            Link
        },
        name:'SendMessage',
        setup() {

            let characters = ref({units:'', remaining:''})
            let senderids = reactive([])
            let form = useForm({
                mobile: '',
                msg: '',
                senderid: ''
            });

            onMounted(()=>{
//               let headers =  {
//     "Access-Control-Allow-Origin": "*",
//  }
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
              let senderidurl = "https://portal.zettatel.com/SMSApi/senderid/read?userid="+process.env.MIX_TALK_USER_ID+"&password="+process.env.MIX_TALK_USER_PASSWORD+"&output=json"
               axios.get(senderidurl)
                .then(response => {
                    // console.log(response.data.response.senderidList);
                    let senderidsData = response.data.response.senderidList
                    // return console.log(senderidsData)
                    senderidsData.forEach(element => {
                        // console.log(element.senderid)
                        senderids.push(element.senderid)
                        console.log(senderids)
                    });
                    // console.log(senderids)
                });


            })

            const checkCharacters = () => {

                let encodedText = form.msg.replace(/\s/g, '+')
                const url = "https://portal.zettatel.com/SMSApi/info/msg?userid="+process.env.MIX_TALK_USER_ID+"&password="+process.env.MIX_TALK_USER_PASSWORD+"&msg="+encodedText+"&output=json"
                axios.get(url)
                .then(response => {
                    characters.value.units = response.data.response.msgList.credit
                    characters.value.remaining = response.data.response.msgList.remaining
                    // remainingCharacters.value = response.data.response.msgList.remaining
                    console.log(characters.value);
                });



               // get(route("check"))
                // alert('hi')
            }

            const sendLaravel = () => {

                form.post(route("sending"))


            }

            const sendWhatsapp = () => {
                alert('hi')

                // form.post(route("sending"))


            }

            const sendText = () => {

                let payload = {
                "userid": "levzealot",
                "password" : "Password2021",
                "senderid": "LEVZEALOT",
                "msgType": "text",
                "duplicatecheck": "true",
                "sendMethod": "quick",
                "sms": [
                    {
                    "mobile": ['254716202298'],
                    "msg": 'something'
                    },
                    ]
                }

                this.$http
                .post("https://portal.zettatel.com/SMSApi/send", payload, {
                    headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Access-Control-Allow-Origin": "https://portal.zettatel.com",
                    // 'Access-Control-Allow-Origin':'https://portal.zettatel.com',
                    'Access-Control-Allow-Origin':true,
                    'Access-Control-Allow-Origin':'*',
                    "X-Requested-With": "XMLHttpRequest"

                    // 'Access-Control-Allow-Origin':'http://localhost:8000',
                    // 'Access-Control-Request-Method':'*',
                    // "Access-Control-Allow-Origin: *"
                    // "Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}"
                    // "Authorization": `Bearer ${localStorage.getItem('token')}`
                    },
                })
                .then((response) => {
                    if (response) {
                    console.log(response)
                    }
                })
                .catch(error => {
                    console.log(error)
                })
            }

            // const sendLaravel  = async () => {
            //     let payload = {
            //     "userid": "levzealot",
            //     "password" : "Password2021",
            //     "senderid": "LEVZEALOT",
            //     "msgType": "text",
            //     "duplicatecheck": "true",
            //     "sendMethod": "quick",
            //     "sms": [
            //         {
            //         "mobile": ['254716202298'],
            //         "msg": 'something'
            //         },
            //         ]
            //     }
            //     await fetch('https://portal.zettatel.com/SMSApi/send', {
            //         method: "POST",
            //         headers: {
            //             "Content-Type": "application/json",
            //             "Accept": "application/json",
            //             'Access-Control-Allow-Origin': 'http://localhost:8000/karibu'
            //         },
            //         body: JSON.stringify(payload)
            //     })
            // }

            return{
                characters,
                sendText,
                sendLaravel,
                form,
                checkCharacters,
                sendWhatsapp,
                senderids
            }

        }
    })
</script>
