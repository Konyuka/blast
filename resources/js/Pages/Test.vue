<template>
<div class="p-5">
    <form class="space-y-8 divide-y divide-gray-200">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Phone Number
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    +254
                </span>
                <input v-model="number" type="text" name="username" id="username" autocomplete="username" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                </div>
            </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Text Message
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea v-model="message" id="about" name="about" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
            </div>
            </div>

        </div>
        </div>

    </div>

    <div class="pt-5">
        <div class="flex justify-end">
        <button @click.prevent="sendtext" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Send Text
        </button>
        <button @click.prevent="sendapp" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Send Whatsapp
        </button>
        </div>
    </div>
    </form>
</div>
</template>

<script>
import axios from 'axios';


export default {
    name:'Test',
    props: {
        senders:'',
    },
    data() {
        return {
            number: '',
            message: '',
        }
    },
    methods: {
        sendtext(){

            let payload = {
                "userid": "levzealot",
                "password" : "Password2021",
                "senderid": "LEVZEALOT",
                "msgType": "text",
                "duplicatecheck": "true",
                "sendMethod": "quick",
                "sms": [
                    {
                    "mobile": [this.number],
                    "msg": this.message
                    },
                ]
            }

            this.$http
            .post("/SMSApi/send ", payload, {
              headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
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
        // sendapp(){

        //     // const axios = require('axios')
        //     let encodedText = encodeURI('buda niaje bana')

        //     return axios.post("https://wa.me/254716202298/?text="+encodedText, {

        //             })
        //             .then(function (response) {
        //                 console.log(response);
        //             })



        // }

    }

}
</script>


