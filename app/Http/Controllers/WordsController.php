<?php

namespace App\Http\Controllers;

use App\User;
use App\Word;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    //This is get for Entering words page
    public function create(Request $request)
    {

       // http://127.0.0.1/PersonalDectionary/public/words/create
        //this code important for getting the EnterWord page
        $user_id = $request->user()->id;
        $w=Word::all()->where('user_id','like',$user_id)->pluck('word','id');


        return view('EnterWord',compact('w'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //this is post method fot Entering words to the db
    public function store(Request $request)
    {

        $words=$request->input('words'); //these words comes from checkboxes as array

//
        foreach ($words as $singleWord ) {

          $user = new User; //User Model for entry in the relation
            $user_id = $request->user()->id; //Get the id of logged user

            $currentID = $user->find($user_id);// take the record object for the logged user

             $currentID->words()->create(['user_id' => $user_id, 'word' => $singleWord]);//insert to DB words for this user

//echo $currentID->name." has saved ->".$singleWord."<br>"; //information message , remove it later

        }

        return redirect(asset('home'));

   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //it accessed from this link:
        //http://127.0.0.1/PersonalDectionary/public/words/31
        //31 is word id
        //this used to show wither this words  has a note and to check who is the user it belong to (testing)
        return view('show',compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //Here I can update directly without query. [model binding]
        //http://127.0.0.1/PersonalDectionary/public/words/1/edit
        //it works by id :
        //http://127.0.0.1/PersonalDectionary/public/words/{{id}}/edit

//        dd($word->word);
       // words/1/edit
        return view('table',compact('word'));

//this is get. now go for update method as well for the post
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //this is PUT method to edit notes on words in the db
//$word->word=$request['word'];

        $usr=\Auth::user()->id;
        $user=$request->user()->id;

        if($user==$usr){$word->Note=$request['note'];
            $word->save();}


        return redirect()->to('excite');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        //see remove.blade.php or excite.blade.php (remove  word button)
        $word->delete();

//sleep(1);
        return redirect()->back();


    }
//by sami see edit and update
//    public function table(Word $word)
//    {
//        $usr=\Auth::user()->id;
//
//        $wordModel=new \App\Word;
//
//        $words=$wordModel->where('user_id','like',$usr)->get();
//
//
////      dd($words);
//        //
//        return view('table',compact('word'));
//    }

    public function a2z(Request $request){
//get current user ID
        $usr=\Auth::user()->id;



        $words = \DB::table('words')
            ->select('word', \DB::raw('count(*) as Frequency'))
            ->where('user_id','like',$usr )
            ->groupBy('word')
            ->orderBy('Frequency', 'desc')
            ->get();

//dd($words);

        return view('A2Z',compact('words'));

    }

    public function search(){

        //get current user ID
        $usr=\Auth::user()->id;

        //Word model
        $wordModel=new \App\Word;

        //Word of the current user only
//        $words=$wordModel->where('user_id','like',$usr)->pluck('word','id');
//        $words=$wordModel->where('user_id','like',$usr)->get();

//        $words = Word::select([ \DB::raw(' DISTINCT(word)')])
//            ->where('user_id', $usr)
//            ->get();


        $words = \DB::table('words')
            ->select('word', \DB::raw('count(*) as Frequency'))
            ->where('user_id','like',$usr )
            ->groupBy('word')
            ->orderBy('Frequency', 'desc')
            ->get();

        //------------------------------------------------------

//k come from form
        $keyword=request('k');
//        dd($keyword);
        return view('search',compact('keyword','words'));
//sending words to generate table . and send keyword to be used in searching
    }

//rank name is reserved in SQL cannot be used
//similar code in homeController to show list in home page
//dd($topWords);
    public function test(){
      $usr=\Auth::user()->id;

//This sql will get the top  words for the current user ,desc order
//Wednesday, 29 July 2020 at 21:00:07
        $topWords = \DB::table('words')
            ->select('word', \DB::raw('count(*) as Frequency'))
            ->where('user_id','like',$usr)
            ->groupBy('word')
           // ->limit(3)
            ->orderBy('Frequency', 'desc')
            ->get();

        return view('test',compact('topWords'));

    }


    public function chart(){
        $usr=\Auth::user()->id;

//Wednesday, 30 July 2020 at 21:00:07
        $chWords = \DB::table('words')
            ->select('word', \DB::raw('count(*) as Frequency'))
            ->where('user_id','like',$usr)
            ->groupBy('word')
            ->orderBy('Frequency', 'desc')
            ->limit(5)
            ->get();
//
        $array[] = ['Word', 'Frequency'];
        foreach($chWords as $key => $value)
        {
            $array[++$key] = [$value->word, $value->Frequency];
        }
        return view('chart')->with('word', json_encode($array));
    }



//    }

    public function posts()
    {
        $words = \Auth::user()->words;
        return view('excite',compact('words'));
    }

//    public function Gsinglestore(Request $request)
//    {
//
//
//return view('note');
//    }

//    public function Psinglestore(Request $request)
//    {
//        $word=$request->word;
//        $note=$request->Note; // from the form in note.blade.php
//
//
//        $user = new User; //User Model for entry in the relation
//        $user_id = $request->user()->id; //Get the id of logged user
//
//        $currentID = $user->find($user_id);// take the record object for the logged user
//
//        $currentID->words()->create(['user_id' => $user_id, 'word' => $word,'Note'=>$note]);//insert to DB words for this user
//
//        return view('home');
//    }


}
