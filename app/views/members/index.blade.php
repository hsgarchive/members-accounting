@extends('layouts.dashboard')

@section('home')
    <table>
        <tr>
            @foreach(array_keys($members[0]) as $header)
                <td>{{ $header }}</td>
            @endforeach
        </tr>
        @foreach($members as $member)
        <tr>
            @foreach($member as $detail)
                <td>{{ $detail }}</td>
            @endforeach
        </tr>
        @endforeach
    </table>

@stop
