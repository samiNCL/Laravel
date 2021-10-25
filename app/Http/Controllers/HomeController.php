<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //sending the number of words for the current user to be displayed in home.
        $user_id = \Auth::user()->id;

        $w=\App\Word::all()->where('user_id','like',$user_id)->pluck('word','id');

      //  dd(count($w));
        $number_of_Words=count($w);

       $www= \DB::table('words')
           ->where('user_id','like',$user_id)
           ->distinct()
           ->count('word');



//dd($www);

       // number_of_Words
        $topWords = \DB::table('words')
            ->select('word', \DB::raw('count(*) as Frequency'))
            ->where('user_id','like',$user_id )
            ->groupBy('word')
            ->limit(3)
            ->orderBy('Frequency', 'desc')
            ->get();

        return view('home',compact('www','number_of_Words','topWords'));

    }





}
