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


        //  $response = Http::get('https://portal.zettatel.com/SMSApi/account/readprofile?userid=textduka&password=Ht7WGsX2&output=json');
         $response = Http::get('https://portal.zettatel.com/SMSApi/account/readcredithistory?userid=textduka&password=Ht7WGsX2&fromdate=2021-11-25&todate=2021-11-25&output=json')
                           ->json();
        //  dd($response);
         return Inertia::render('Test', [
             'senders' => $response,
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
