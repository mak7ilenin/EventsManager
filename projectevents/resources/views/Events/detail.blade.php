@extends('layouts.appMain')

@section('content')
    <a href="/" class="btn btn-primary absolute-top ml-3 mt-3">Back to events</a>
    <h1 class="text-center my-5">Event Information</h1>
    <div class="card w-75" style="margin: 30px auto; max-width: 900px">
        <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt="" style="object-fit: cover">
        <div class="card-body">
            <div class="w-100 d-flex justify-between">
                <h4 class="card-title w-50" style="color: #98acc1">{{ $event->title }}</h4>
                <a href="/event/{{ $event->id }}/register" class="btn btn-success w-50"
                    style="text-decoration: none; color: #fff;">
                    Register for this event
                </a>
            </div>
            <p class="card-text" style="font-size: 18px;">
                <b>Event date:</b> {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
            </p>
            <p class="card-text fs-5">
                <b>Address:</b> {{ $event->aadress }}
            </p>
            <p class="card-text" style="font-size: 18px;">{{ $event->description }}</p>
            <p class="card-text border-top pt-2">
                Last updated at:
                <small class="text-body-secondary">
                    {{ Carbon\Carbon::parse($event->updated_at)->format('d.m.Y') }}
                </small>
            </p>
        </div>
    </div>
@endsection
