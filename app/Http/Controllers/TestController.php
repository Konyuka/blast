<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{

    public function index()
    {
        //  $popularMovies = Http::withHeaders([
        //     'X-First' => 'foo',
        //     'X-Second' => 'bar'
        //  ])->
        //  get('https://api.themoviedb.org/3/movie/popular')
        //  ->json()['results'];

        //  $response = $client->get('https://api.example.com/api/AvailabilitySearch', [
        //     'headers' => [
        //         'Authorization' => 'Bearer YOUR_TOKEN_HERE',
        //     ],
        //     'form_params' => [
        //         'VisitDate' => '2017-05-08',
        //         'PartySize' => '2',
        //         'ChannelCode' => 'ONLINE',
        //     ],
        // ]);


         $response = Http::get('https://portal.zettatel.com/SMSApi/account/readprofile?userid=levzealot&password=Password2021&output=json')
                     ->json();
         return Inertia::render('Test', [
             'senders' => $response,
         ]);
    }

    public function send()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://portal.zettatel.com/SMSApi/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "userid=levzealot&password=xxxxx&mobile=91xxxxxxxxxx&msg=Hello+World%21+This+is+a+test+message%21&senderid=SENDER&msgType=text&duplicatecheck=true&output=json&sendMethod=quick",
        CURLOPT_HTTPHEADER => array(
            "apikey: somerandomuniquekey",
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
