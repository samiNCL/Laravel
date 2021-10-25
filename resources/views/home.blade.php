@extends('layouts.app')
<style>

    @import url('https://fonts.googleapis.com/css2?family=Crimson+Text:wght@700&display=swap');

    h1,h2,h3,h4,h5,h6,.p,div,body,ul,il,input,button,span,a.btn,button, svg { font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, Geneva, Verdana, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; } h3 { font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, Geneva, Verdana, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; } p { font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, Geneva, Verdana, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; } blockquote { font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, Geneva, Verdana, sans-serif; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; } pre { font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, Geneva, Verdana, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5667px; }
   *{max-width: 100%}
    .mm{margin: 5px;}
   .body {

        background-color: whitesmoke;
       background-repeat: repeat-x;


   }

    #deco {

        background-color: #fefdff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='12' viewBox='0 0 20 12'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='charlie-brown' fill='%2325a2b7' fill-opacity='0.12'%3E%3Cpath d='M9.8 12L0 2.2V.8l10 10 10-10v1.4L10.2 12h-.4zm-4 0L0 6.2V4.8L7.2 12H5.8zm8.4 0L20 6.2V4.8L12.8 12h1.4zM9.8 0l.2.2.2-.2h-.4zm-4 0L10 4.2 14.2 0h-1.4L10 2.8 7.2 0H5.8z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);


    }
    * {
        box-sizing: border-box;
    }



    .column {
         float: left;
         width: 85%;
         padding: 15px;
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);



     }


    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;

    }

    /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
    @media screen and (max-width:600px) {
        .column {
            width: 100%;
        }
    }
</style>
<div class="body">
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 style="

font-family: 'Crimson Text', serif;

">
                Hello, This is your personal dictionary website.  <a href="help"> How to use it?</a>

            </h3> </div>


        <div class="card-body">
 @if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif

{{-- 1   --}}
     <div class="row">
         <div id="deco" class="column card card-title ">

            <p class="p">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layout-text-sidebar-reverse" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                    <path fill-rule="evenodd" d="M5 15V1H4v14h1zm8-11.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                </svg>
                You have ({{$www}} ) different words in your dictionary </p>
           <h6 style="margin-left: 35px;"> Out of ({{$number_of_Words}}) entries that include repeated words.</h6>
         </div>




     </div>



     {{-- 2   --}}

     <div class="row">
         <div class="column card mm" style="max-width: 29rem">
             <h4> Add to your dictionary <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>
                     <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
                 </svg></h4>     <br>
             <a style="max-width: 18rem" href="{{route('words.create')}}" class="btn btn-outline-info  "> {{'Add words' }}</a>
             <a style="margin-top:3px;max-width: 18rem" href="excite" class="btn  btn-outline-info "> {{'Notes'}}</a>

         </div><br/>

         <div class="mm column card" style="max-width: 27rem;margin-left: 0px;">
     <h4> Lookup <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-binoculars" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                 </svg></h4><br>

             <form method="post" action="{{asset('search')}}">
                 @csrf
                 <input name="k" id="k" style="max-width: fit-content" type="text">
                 <button  style="margin-top: 5px;" type="submit">Find</button>
             </form>


         </div>

     </div>


     {{-- 3   --}}
<br>
     <div class="row">
         <div class="column card card-title ">

           <p class="p">  <a href="{{asset('a2z')}}"> All words by letters</a>
               <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                   <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z"/>
                   <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z"/>
               </svg>
           </p>

         </div>
         <div class="column card card-title ">


             <div class="card-body ">
                 Top words frequently added     </div>

             @foreach($topWords as $t)

                 <ul class="list-group">
                     <li  class="list-group-item d-flex justify-content-between align-items-center">{{$t->word}}
                         <span class="badge badge-primary badge-pill">&nbsp;added&nbsp;({{$t->Frequency}})&nbsp;times
                         </span></li>



                 </ul>
             @endforeach

         </div>

     </div>


     {{--end of 3 cols    --}}

     {{--4   --}}

     <br>
     <div class="row">

         <iframe style="margin-left: 25px;border: #1b1e21" width="850" height="400" src="{{url('chart')}}">Your browser isn't compatible</iframe>


     </div>
     {{--end of 4   --}}

        </div>

</div>

</div></div>

 @endsection
