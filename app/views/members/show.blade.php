@extends('layouts.generic')

@section('content')
    <!-- {{  json_encode($member) }} -->
    
    <h1>{{ $member['Name'] }}</h1>
    <p>{{ $member['Status'] }}</p>
    <p>{{ $member['email'] }}</p>
    
    @if (count($paypal))
    <table>
        <tr>
            @foreach(array_keys($paypal[0]) as $header)
                <td>{{ $header }}</td>
            @endforeach
        </tr>
        @foreach($paypal as $details)
            <tr>
                @foreach($details as $detail)
                    <td>{{ $detail }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    @endif
    @if (count($stanchart))
    <table>
        <tr>
            @foreach(array_keys($stanchart[0]) as $header)
                <td>{{ $header }}</td>
            @endforeach
        </tr>
        @foreach($stanchart as $details)
            <tr>
                @foreach($details as $detail)
                    <td>{{ $detail }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    @endif
@stop
