@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jquery-3.5.1.min.js">
    </script></head>
    <div class="container" style="">

        <h4 class="bg-dark" style="width: 500px;color: white"> Press the green button to Add/edit notes </h4>
        <h4 class="bg-transparent" style="width: 500px"> Click on Remove to delete the record  totally.</h4>
{{-- --}}
        <hr>
        <h4 class="bg-transparent" style="width: 500px;display: inline"> Filter:</h4>

        <input type="text" placeholder="Type a word" id="txt">
        <button id="btn" onclick="showOne(

document.getElementById('txt').value

)">show</button>
        <hr>


        {{--        --}}






    @forelse($words as $word )


{{-- hidden word_id for testing --}}
        <div class="hide {{$word->word}}">
{{--            --}}
            <h1 name="wordID"  style="display:none"> {{$word->id}} </h1>
            <h1>{{$word->word}}</h1>
            <a style="width: 256px; margin: 0px" class="mb-2 btn btn-info" href="words/{{$word->id}}/edit">
                Add/edit Note

                        </a>
            <div style="width:256px; height:100px; overflow: scroll;" class="mb-2 list-group-item">{{$word->Note}}</div>

            {{-------------------------------------------------------------------}}

            <form method="post" action="{{route('words.destroy',$word->id)}}">
                {{-- words/{id}/destroy   --}}
                @method('DELETE')
                @csrf

                <button style="width: 256px;" class="btn btn-danger mb-2" onclick="return confirm('Remove?') " type="Submit" name="Remove">Remove</button>
            </form>
{{--            --}}
        </div>
{{--            <hr>--}}
@empty @endforelse
        </div>
@endsection
<script>

    function showOne(x) {
        //show only by class [lookup button] 4 Aug 2020
        if (x != "")
        {
            // alert(x);
            $('.hide').not('.' + x).hide();
            document.getElementById('txt').value="";
            document.getElementById('txt').style.display="none";

            document.getElementById('btn').innerHTML="Back";
        }
        else{

            location.reload();
        }

    }




</script>
