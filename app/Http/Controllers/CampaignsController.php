<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use \Validator;

use App\Http\Requests;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::all();
        //$clients = $campaigns->clients();
        $all_clients = Client::all();


        return view('campaigns.show', compact('campaigns', 'all_clients'));
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
//        dd($request);
//        $rules = array(
//            'name' => 'required|max:255',
//            'body' => 'required',
//            'assigned_date' => 'required',
//            'start_date' => 'required',
//            'due_date' => 'required'
//        );
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()){
//            $messages = $validator->messages();
//
//            return back()->withErrors($validator);
//        }
//        $this->validate($request, [
//            'name' => 'required|max:255',
//            'client' => 'required',
//            'assigned_date' => 'required|date|after:today',
//            'start_date' => 'required|date|before:due_date',
//            'due_date' => 'required|date|after:start_date',
//        ]);



       // $campaign = new Campaign(Input::all());
        $campaign = new Campaign;
        $campaign->creation_user_id = Auth::user()->user_id;
        $campaign->client_id = preg_replace("/[^0-9]/",-1,$request->get('client'));
        //dd($request);
        //dd("client id: ". $campaign->client_id);
        //$campaign->client_id = $request->get('client_id');
        $campaign->name = $request->get('name');
        $campaign->default_article_type = $request->input('default_article_type');
        $campaign->assigned_date = $request->get('assigned_date');
        $campaign->start_date = $request->get('start_date');
        $campaign->due_date = $request->get('due_date');

        //dd($campaign);
        $campaign->save();

        return back();
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
