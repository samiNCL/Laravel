<!--
In this code I refer to : datatables.net
Wednesday, 22 July 2020 at 10:01:19

table is for edit Note ( add Note)
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
input[type=search] {color: #761b18}
    </style>
</head>
<body>

<div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Go
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{asset('home')}}">Homepage</a>
        <a class="dropdown-item" href="{{asset('words/create')}}"> Add new words </a>
        <a class="dropdown-item" href="{{asset('a2z')}}"> Words by letters </a>


    </div>
<br><hr>
<div class="container">

    <table id="example" class="display" style="width:100%">
    <thead>
    <tr>
{{--        <th>Date</th>--}}
        <th></th>
        <th></th>
        <th></th>



    </tr>
    </thead>
    <tbody>
    <form method="post" action="{{route('words.update',$word)}}">
        @csrf
        @method('PATCH')
{{--above very important--}}

{{--        $x=$wd->word->count('word');--}}
        <tr>
{{--            <td >{{$word->created_at->format('d-m-Y')}}</td>--}}
            <td>{{$word->word}}</td>
            <td ><input type="text" name="note" style="width: 300px ;">{{$word->Note}}
                <button type="submit">Save note</button></td>


        </tr>
{{--   Future feature  colouring notes . need to modify DB for notes  --}}
{{--        <tr><td> <input type="checkbox">Highlight</td>--}}
{{--            <td>Centralize </td><td> Timestamp</td></tr>--}}

    </form>



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
            $('#example').DataTable();



        } );
//-------------------------------------------
        $('#example').dataTable( {
            "columnDefs": [
                { "width": "1%", "targets": 0 },
                { "width": "14%", "targets": 1 },
                { "width": "40%", "targets": 2 },
                { "width": "50%", "targets": 3}


            ]
        } );


    </script>
    <script>


    </script>

</head></html>





        {{--    //Monday, 27 July 2020 at 11:19:18--}}






