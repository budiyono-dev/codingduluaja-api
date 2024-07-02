<table class="table table-hover table-sm">
    <thead>
        <tr>
            @foreach ($head as $h)
                <th scope="col">{{$h}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($row as $r)
            <tr>
            @foreach ($r as $c)
            <td>{{$c}}</td>
            @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
