@extends('layouts.app')

@section('content')
    <h1>Insert new word</h1>
<div class="container">
    <form class="form-group" method="post" action="{{route('words.Psinglestore')}}">
        @csrf
    Word:
    <input type="text" name="word">
        Note:
    <input type="text" name="note">
    <input type="submit">

</form>
</div>

@endsection





