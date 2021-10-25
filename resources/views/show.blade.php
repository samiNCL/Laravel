@extends('layouts.app')
@section('content')


{{--//no need for foreach here!--}}
<div class="container" >
  <div class="card " style="width: 45%;margin-left: 53px">
      <h6>This word belong to:</h6><h2> {{$word->find($word->id)->user->name}}</h2>
{{--     Fri 31 Jul 2020 //Great--}}
  <div class="card card-header">{{$word->word}}</div> <div class="card card-body">
          @if(empty($word->Note))
                                 There is no note for this word yet.
                                @else
              {{$word->Note}}
           @endif

    </div>

  </div>

</div>

    @endsection

