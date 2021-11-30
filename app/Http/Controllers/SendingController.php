<?php

namespace App\Http\Controllers;

use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;



class SendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        // $postData = Request::validate([
        //         'mobile' => ['required'],
        //         'msg' => ['required'],
        // ]);

        // return dd($postData);

        // $client = new Client();







        $url = 'https://portal.zettatel.com/SMSApi/send';
        $sms = array(
            (object) [
                'mobile' => array('254716202298'),
                'msg' => 'laravel check'
            ],
        );
        $data = (object)[
            'userid' => 'levzealot',
            'password' => 'Password2021',
            'senderid' => 'LEVZEALOT',
            'msgType' => 'text',
            'duplicatecheck' => 'true',
            'sendMethod' => 'quick',
            'sms' => $sms,
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://portal.zettatel.com/SMSApi/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "userid=levzealot&password=Password2021&mobile=254716202298&msg=Bwakni+World%21+This+is+a+test+message%21&senderid=LEVZEALOT&msgType=text&duplicatecheck=true&output=json&sendMethod=quick",
        CURLOPT_HTTPHEADER => array(
            "apikey: somerandomuniquekey",
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        return dd($response);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }





        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data2),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            print_r(json_decode($response));
        }






        $topost = json_encode($data);
        // return dd($topost);

        // $response = Http::post($url, $data, [
        //     'headers' => [
        //         'Content-type' => 'application/json',
        //         'Accept' => 'application/json'
        //     ],
        //     'json' => $topost
        // ]);




        // return dd($response);

        $response = Http::withHeaders(
            [
            'Content-type' => 'application/json',
            'Accept' => 'application/json'
            ])->
            post(
                'https://portal.zettatel.com/SMSApi/send',
                [
                    'body' => $topost
                ]
            );
        return dd($response);



        $client = new Client();
        $request = $client->
        post(
            // $url,
            'https://portal.zettatel.com/SMSApi/send',
            [
                'content-type' => 'application/json'
            ],
        );
        $request->setBody($data);
        return dd($request);
        $response = $request->send();
        return dd($response);

        // $client = new GuzzleHttp\Client();
        $client = new Client();
        $response = $client->post(
                'https://portal.zettatel.com/SMSApi/send',
                [

                    'userid' => 'levzealot',
                    'password' => 'Password2021',
                    'senderid' => 'LEVZEALOT',
                    'msgType' => 'text',
                    'duplicatecheck' => 'true',
                    'sendMethod' => 'quick',
                    'sms' => array(
                        (object) [
                            'mobile' => array(['254716202298']),
                            'msg' => 'laravel check'
                        ],
                    )
                ]
            );
        return dd($response);



        $response = Http::withHeaders(
            [
            'Content-type' => 'application/json',
            'Accept' => 'application/json'
            ])->
            post(
                'https://portal.zettatel.com/SMSApi/send',
                [

                    'userid' => 'levzealot',
                    'password' => 'Password2021',
                    'senderid' => 'LEVZEALOT',
                    'msgType' => 'text',
                    'duplicatecheck' => 'true',
                    'sendMethod' => 'quick',
                    'sms' => array(
                        (object) [
                            'mobile' => '254716202298',
                            'msg' => 'laravel check'
                        ],
                    )
                ]
            );
         return dd($response);

        // $data = [
        //     'userid' => 'levzealot',
        //     'password' => 'Password2021',
        //     'senderid' => 'LEVZELOT',
        //     'msgType' => 'text',
        //     'duplicatecheck' => 'true',
        //     'sendMethod' => 'quick',
        //     'sms' => $sms,
        // ];

        // $headers = [
        //     'Accept' => 'application/json',
        //     'Content-Type' => 'application/json',
        // ];

        // $response = Http::post($url, $data, [
        //     'headers' => [
        //         'Content-type' => 'application/json',
        //         'Accept' => 'application/json'
        //     ],
        //     // 'json' => $data
        // ]);

        // $response = Http::withHeaders([
        //     'Content-type' => 'application/json',
        //     'Accept' => 'application/json'
        // ])->post($url, $data);



        // $response = $client->request('POST', $url,
        //     [
        //         'headers' => $this->headers,
        //         'json' => $data
        //     ]
        // );

        // return dd($data);

        // $response = $client->post($url,[
        //     'headers' => ['Content-type' => 'application/json'],
        //     'json' => $data
        // ]);




        return view('karibu', [
            'popularMovies' => $popularMovies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
