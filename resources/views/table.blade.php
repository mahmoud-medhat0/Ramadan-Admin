<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>number</th>
            <th>address</th>
            <th>answer</th>
            <th>created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($answers as $answer)
        <tr>
            <td>{{ $answer->id }}</td>
            <td>{{ $answer->name }}</td>
            <td>{{ $answer->number }}</td>
            <td>{{ $answer->address }}</td>
            <td>{{ $answer->answer }}</td>
            <td>{{ $answer->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
