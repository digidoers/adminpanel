<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function email()
    {
        $input = DB::table('rga1_claim_forms')->first();
        $input->items = json_decode($input->items, true);
        return view('rga1-form',['input'=>json_decode(json_encode($input), true)]);
    }

    public function email1()
    {
        $input = DB::table('rma_claim_forms')->first();
        return view('rma-form',['input'=>json_decode(json_encode($input), true)]);
    }

    public function email2()
    {
        $input = DB::table('rga2_claim_forms')->first();
        $input->items_received = json_decode($input->items_received, true);
        return view('rga2-form',['input'=>json_decode(json_encode($input), true)]);
    }

}
