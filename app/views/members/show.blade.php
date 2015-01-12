@extends('layouts.generic')

@section('content')
    <!-- {{  json_encode($member) }} -->
    
    <h1>{{ $member['Name'] }}</h1>
    <p>{{ $member['Status'] }}</p>
    <p>{{ $member['email'] }}</p>
    
    @if (count($paypal))
    <div class="table-responsive">
    <h3>PayPal</h3>
    <table class="table">
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
    </div>
    @endif
    @if (count($stanchart))
    <div class="table-responsive">
    <h3>Stanchart</h3>
    <table class="table">
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
    </div>
    @endif
    @if (count($accreceivables))
    <div class="table-responsive">
    <h3>Account Receivables</h3>
    <table class="table">
        <tr>
            @foreach(array_keys($accreceivables[0]) as $header)
                <td>{{ $header }}</td>
            @endforeach
        </tr>
        @foreach($accreceivables as $details)
            <tr>
                @foreach($details as $detail)
                    <td>{{ $detail }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    </div>
    @endif
    @if (count($cheques))
    <div class="table-responsive">
    <h3>Cheques</h3>
    <table class="table">
        <tr>
            @foreach(array_keys($cheques[0]) as $header)
                <td>{{ $header }}</td>
            @endforeach
        </tr>
        @foreach($cheques as $details)
            <tr>
                @foreach($details as $detail)
                    <td>{{ $detail }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    </div>
    @endif
@stop
