@extends('layouts.app')

<style>
    *{max-width: 100% ;}
    label::first-letter { text-transform: uppercase;}
    #note{
        width:500px;
        height: 30px;
        margin-left:auto ;
    }
    .deco {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='12' viewBox='0 0 20 12'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='charlie-brown' fill='%2325a2b7' fill-opacity='0.12'%3E%3Cpath d='M9.8 12L0 2.2V.8l10 10 10-10v1.4L10.2 12h-.4zm-4 0L0 6.2V4.8L7.2 12H5.8zm8.4 0L20 6.2V4.8L12.8 12h1.4zM9.8 0l.2.2.2-.2h-.4zm-4 0L10 4.2 14.2 0h-1.4L10 2.8 7.2 0H5.8z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
</style>
@section('content')
<body>
    <div class="dropdown" style="margin: 0px">
        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Go
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{asset('home')}}">Homepage</a>
            <a class="dropdown-item" href="{{asset('words/create')}}"> Search and sort </a>
            <a class="dropdown-item" href="{{asset('a2z')}}"> Words by letters </a>
        </div>

<div class="container">

     <div style="margin-left: 5px ;max-width: 35rem;"  class="form-group bg-transparent ">
         <!--********************************************** -->
         <div class="deco">
         <h3 class="card-header ">Instructions:</h3>
         <div class="card-body card card-text  ">
         <ul>
             <li>Drop a text then press Next</li>
             <li>Select some words </li>
             <li>Submit </li></ul></div>
          </div> <hr>
         <div id="hideLater2" class="bg-transparent ">
        <b class="" >&nbsp;&nbsp;&nbsp;Drop your text bellow:</b> </div>

         <div class="" id="hideLater" style="display: block;">
         <!--********************************************** -->
         <!-- Wednesday, 22 July 2020 at 03:46:04 -->
         <!-- In this  text area  user shall drop a text then press Next button -->
         <textarea id="text" rows="7"  required class="form-control" ></textarea>
         <br>
         <!-- When next button pressed , JavaScript code will turn them to separate words -->
       <div align="center">
           <button style="width: 200px "  class="btn btn-outline-info" type="button" onClick="turn()">Next</button></div>
         <!--********************************************** -->
         </div>





         <!-- This section is hidden until user press next button -->
         <div id="showHide" style="display: none;width:500px;">

             <!-- This section will be filled by JavaScript -->

             <br>
<div style="overflow: auto">
             <form action="{{route('words.store')}}"
                   method="post" onsubmit="jsonArr()">
                 @csrf

                 <ul id="wordList">
                 </ul>

                 <input type="submit" value="submit" name="submit" id="submit" class="btn btn-success" style="align-self: center;width: 200px">
             </form>
         </div></div>
     </div>
</div>
@endsection

<!--********************************************** -->


     <script>

         // alert("DOM is Ready");


         function turn() {
             /* This function will do the following:
             -Take the text from the text aria element
             -Detect only the words by Regix . All numbers and symbols removed.
             - Turn the words to list of words can be checked (checkboxes)
             */
             let text= document.getElementById("text").value;

             if (text==""){alert('Please enter some text first.');}
             else {
                 document.getElementById("hideLater").style.display = 'none';
                 document.getElementById("hideLater2").style.display = 'none';




//Force filling the text area

//If text area filled the block  shows up

                 document.getElementById("showHide").style.display='block';
//Removing all non letters
                 let regx = text.match(/\b[A-Z]+\b/gi);
//remove dublcate words
                 let unique = [...new Set(regx)];


                 let words, aList;
                 words = unique;
//Loop the words putting them in a list
aList="<ul><table class=\'form-group\'><tr><td>";
words.forEach(singleWord);
aList += "</ul></td></tr></table>";

                 // aList="<ul>";
                 // words.forEach(singleWord);
                 // aList += "</ul>";

//This function display the list with checkboxes
                 function singleWord(value) {

                     aList +="<input  type=\"checkbox\""+"name=\"words[]\""+ "id=\""+ value +"\""+"value=\""+value+"\">"+"&nbsp;&nbsp;"+
  "<label for=\""+value+"\">"+ value+"</label><br>";

                     // aList +="<input  type=\"checkbox\""+"name=\"words[]\""+ "id=\""+ value +"\""+"value=\""+value+"\">"+
                     //     "<label  for=\""+value+"\">"+ value+"</label><br>";

                 }
                 document.getElementById("wordList").innerHTML = aList;
             }

         }

         //this json may be needed later for future work

         function jsonArr(){
             let arr=[];
             let chckd = document.querySelectorAll("input[type=checkbox]");
             //
             chckd.forEach((snglChckd) => {
                 if(snglChckd.checked) {
                     arr.push(snglChckd.value);
                 }});
             // var jsn=JSON.stringify(arr);
             alert("Those words:["+arr+"]"+ "\nsaved successfully\n You will be redirected to homepage now");
         }


     </script>


