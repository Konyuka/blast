<?php

namespace App\Http\Controllers;

use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;



class SendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

        $url = 'https://portal.zettatel.com/SMSApi/send';
        $sms = array(
            (object) [
                'mobile' => array($request->mobile ),
                'msg' => $request->msg
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
        CURLOPT_POSTFIELDS => "userid=levzealot&password=Password2021&mobile=$request->mobile&msg=$request->msg&senderid=LEVZEALOT&msgType=text&duplicatecheck=true&output=json&sendMethod=quick",
        CURLOPT_HTTPHEADER => array(
            "apikey: somerandomuniquekey",
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        // return dd($response);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }

        $sendingdId = json_decode($response, true);
        // $textID = $sendingdId->transactionId;
        $textID = $sendingdId['transactionId'];

        // return dd($sendingdId['transactionId']);
        // return dd($textID);


        return Redirect::route('karibu')->with('success', $textID);

        return Inertia::render('Karibu', [
             'textID' => $textID,
        ]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkUnits()
    {

        $response = Http::get('https://portal.zettatel.com/SMSApi/info/msg?userid=levzealot&password=Password2021&msg=This+is+my+Message&output=json');
        return dd($response);
        return Inertia::render('Karibu', [
             'check' => json_decode($response, true),
        ]);
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
