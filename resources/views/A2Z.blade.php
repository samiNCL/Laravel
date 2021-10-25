<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
        p::first-letter { text-transform: uppercase;}
    .filterDiv {
        background-color: #1e8bf3;
        color: #e8fff0;
        width: 100px;
        line-height: 100px;
        text-align: center;
        margin: 20px;
        display: none;
    }

    .show {
        display: inline-block;
    }

    .container {
        margin-top: 20px;
        overflow: hidden;
    }

    /* Style the buttons */
    .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #ddd;
    }

    .btn.active {
        background-color: #5e6661;
        color: white;
    }
</style>{{--28 JUl 2020--}}



    <div id="myBtnContainer" style="max-width: 100%; margin: 33px;padding: 20px">


        <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Go
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{asset('home')}}">Homepage</a>
                <a class="dropdown-item" href="{{asset('words/create')}}"> Add new words </a>
                <a class="dropdown-item" href="{{asset('table')}}"> Search and sort </a>


            </div>
        </div>
<hr>


    <button class="btn active" onclick="filterSelection('all')"> Show all</button>
    <button class="btn" onclick="filterSelection('aa')"> A</button>
    <button class="btn" onclick="filterSelection('bb')"> B</button>
    <button class="btn" onclick="filterSelection('cc')"> C</button>
    <button class="btn" onclick="filterSelection('dd')"> D</button>
    <button class="btn" onclick="filterSelection('ee')"> E</button>
    <button class="btn" onclick="filterSelection('ff')"> F</button>
    <button class="btn" onclick="filterSelection('gg')"> G</button>
    <button class="btn" onclick="filterSelection('hh')"> H</button>
    <button class="btn" onclick="filterSelection('ii')"> I</button>
    <button class="btn" onclick="filterSelection('jj')"> J</button>
    <button class="btn" onclick="filterSelection('kk')"> K</button>
    <button class="btn" onclick="filterSelection('ll')"> L</button>
    <button class="btn" onclick="filterSelection('mm')"> M</button>
    <button class="btn" onclick="filterSelection('nn')"> N</button>
    <button class="btn" onclick="filterSelection('oo')"> O</button>
    <button class="btn" onclick="filterSelection('pp')"> P</button>
    <button class="btn" onclick="filterSelection('qq')"> Q</button>
    <button class="btn" onclick="filterSelection('rr')"> R</button>
    <button class="btn" onclick="filterSelection('ss')"> S</button>
    <button class="btn" onclick="filterSelection('tt')"> T</button>
    <button class="btn" onclick="filterSelection('uu')"> U</button>
    <button class="btn" onclick="filterSelection('vv')"> V</button>
    <button class="btn" onclick="filterSelection('ww')"> W</button>
    <button class="btn" onclick="filterSelection('xx')"> X</button>
    <button class="btn" onclick="filterSelection('yy')"> Y</button>
    <button class="btn" onclick="filterSelection('zz')"> Z</button>

</div>

<p class="container " style="max-width: 100%">

    <!--
    // var str = "abcdefghijklmnopqrstuvwxyz";
    // var alphaArray = str.split("");
    // str.forEach(generate);

    // function generate(item, index) {
    //   var div = new Element('div');

    //    -->

{{--//This is really complex code. The following php responsible of generating dynamic--}}
{{--    //HTML to make Javascript bellow responsive to it--}}
   <?php

    for ($x = ord('a'); $x <= ord('z'); $x++) { ?>
   @foreach ( $words  as $key=>$wd)
       @if(substr($wd->word, 0, 1)==chr($x))
        <?php   echo "<p class=\"filterDiv"." ".chr($x).chr($x)."\">"; ?>
            {{$wd->word }}
@endif
@endforeach
    <?php  } ?>

</div>

<script>
    filterSelection("all")
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>


