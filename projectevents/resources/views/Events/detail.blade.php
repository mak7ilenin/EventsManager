@extends('layouts.appMain')

@section('content')
    <a href="/" class="btn btn-primary absolute-top ml-3 mt-3">Back to events</a>
    <h1 class="text-center my-2">Event Information</h1>
    <div class="card w-75" style="margin: 30px auto; max-width: 900px">
        <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt="" style="object-fit: cover">
        <div class="card-body">
            <div class="w-100 d-flex justify-between top_container">
                <h4 class="card-title w-50" style="color: #98acc1">{{ $event->title }}</h4>
                <a href="/event/{{ $event->id }}/register" class="btn btn-success w-50"
                    style="text-decoration: none; color: #fff; font-size: 19px">
                    Register for this event
                </a>
            </div>
            <p class="card-text" style="font-size: 18px;">
                <b>Event date:</b> {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
            </p>
            <p class="card-text" style="font-size: 18px;">
                <b>Registered users:</b>
                {{ $count_members }} people
            </p>
            <p class="card-text" style="font-size: 18px;">
                <b>Address:</b> {{ $event->aadress }}
            </p>
            <p class="card-text mb-1" style="font-size: 18px;">
                <b>Description:</b> <br>
                <p class="pl-2" style="font-size: 18px;">
                    {{ $event->description }}
                </p>
            </p>
            <p class="card-text border-top pt-2">
                Last updated at:
                <small class="text-body-secondary">{{ $updated_at }}</small>
            </p>
        </div>
    </div>
@endsection
