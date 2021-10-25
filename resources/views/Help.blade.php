@extends('layouts.app')
@section('content')
<div class="container">

<ul class="bg-white card-body" style="padding: 5%">
     <h5>This website assists you in tracking the vocabulary learning process and can serve as a log for your reference.
         Your vocabulary list is saved online so that it is accessible everywhere, on any device.
         It also helps you detect the most frequently added vocabulary.</h5>
        <br>
        <br>

     <b><u>To make optimal use of this website, use it as follows:</u></b>

<br><br><li>Your learning activity is web-based (or on any media), and you encounter difficult words you need to learn.</li>
       <li>Copy the paragraph that contains those words and paste it in.</li>
       <li>The program will remove any numbers and symbols and generate a word list for you. Choose only the difficult words. Then submit them. </li>
       <li>Now they are saved. You can easily add notes for each word in your list.</li>
       <li>The notes might contain the meaning of words, examples, or anything else you prefer. You can search for a word from the homepage.</li>
      <li>As you keep recording the difficult words, over time, you will be able to see the most frequent words.</li>
       <li>You can also navigate through your words by letter for quick overall revision.</li>

    </ul>



    <p class="alert-link">
<a class="btn bg-secondary button btn-block" style="font-size: x-large;color: #95c5ed" href="home">Start  adding new words you need to memorize </a>
</div>
    @endsection