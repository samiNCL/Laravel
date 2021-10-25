<style> .red{color: red ;text-underline:fuchsia}</style>

User name: <span class="red">{{\Auth::user()->name}}</span>
<hr>
<table>
    @foreach($topWords as $t)

        <tr>
            <td class="red" >{{$t->word}}</td>
            <td>&nbsp;added&nbsp; </td>
            <td class="red">({{$t->Frequency}})</td>
            <td>times</td>
        </tr>


    @endforeach
</table>