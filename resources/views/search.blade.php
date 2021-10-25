<!--
In this code I refer to : datatables.net
Wednesday, 22 July 2020 at 10:01:19
 -->
<html><head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jquery-3.5.1.min.js">
    </script>
    <style>
      td::first-letter { text-transform: uppercase;}
        .container{max-width: 75%}
        *{font-size: 20px;}
        td{font-size: 25px;text-align: center}
       th{text-align: center}
input[type=search] {color: black}
      a { text-transform: uppercase;}

    </style>
</head>
<body>

<div class="dropdown" style="display: block">
    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Go
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{asset('home')}}">Homepage</a>
        <a class="dropdown-item" href="{{asset('words/create')}}"> Add new words </a>
        <a class="dropdown-item" href="{{asset('a2z')}}"> Words by letters </a>

    </div>
<br>
    <div class="container">

    <p class="hid" style="text-align: center" >Searching Result for :&nbsp; <a href="#" >  [{{$keyword}}]</a>  </p>

    <hr>


    <table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th> </th>
        <th>Word</th>
        <th>Frequency</th>


    </tr>
    </thead>
    <tbody>


    @foreach($words as $key=>$wd)
{{--        $x=$wd->word->count('word');--}}
        <tr>
            <td ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-binoculars" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                </svg>
            </td>
            <td style="color: #298fe2"><b>  {{$wd->word}} </b> </td>
            <td >{{$wd->Frequency}}</td>


        </tr>
    @endforeach




    </tbody>
</table>
</div>
</body>


<head>

    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css'>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


{{--    Wednesday, 29 July 2020 at 11:09:15--}}
    <script type="text/javascript">
        $(document).ready(function() {
           let x= document.querySelector("input[type=search]").value= "{{$keyword}}";
            document.querySelector("input[type=search]").style.backgroundColor='silver';
            $('#example').DataTable().search(x).draw();



        } );
//-------------------------------------------
        $('#example').dataTable( {
            "columnDefs": [
                { "width": "0.5%", "targets": 0 },
                { "width": "50%", "targets": 1 },
                { "width": "49.5%", "targets": 2 },



            ]
        } );


    </script>
    <script>

    </script>

</head></html>





        {{--    //Monday, 27 July 2020 at 11:19:18--}}






