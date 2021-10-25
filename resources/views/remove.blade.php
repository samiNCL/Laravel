
{{--This view is not used , just for testing. the working oe is inside excite.blade.php view under remove button --}}
<!DOCTYPE html>
<html>
<head>
    <title>Delete</title>
</head>

<body>
<form method="post" action="{{route('words.destroy',$words)}}">
{{-- words/{id}/destroy   --}}
    @method('Delete')
    @CSRF

    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submet" name="Remove">Remove</button>

</form>
</body>
</html>