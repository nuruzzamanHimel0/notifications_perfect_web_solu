@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                @if(Session::has('success'))

                <div class="alert alert-success" role="alert">
                  {{  Session::get('success') }}
                 </div>
           @endif
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard (Database Notificatio)</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>All NOtifications</h1>
                        @foreach (auth()->user()->notifications as $notification)
                            <p>{{ $notification->data['letter']['title'] }} , {{ $notification->id }}</p>
                        @endforeach

                        <h1>Unread NOtifications</h1>

                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <p>{{ $notification->data['letter']['title'] }}</p>
                        @endforeach

                        <h1>Read NOtifications</h1>
                        @foreach (auth()->user()->readNotifications as $notification)
                            <p>{{ $notification->data['letter']['title'] }} , {{ $notification->id }}</p>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
