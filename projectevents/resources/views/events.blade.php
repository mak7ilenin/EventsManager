@extends('layouts.appMain')

@section('content')
    <h1 class="text-center my-5" style="font-size: 46px;">All events list</h1>
    <form class="form-control w-50 mx-auto my-3 d-flex flex-wrap h-auto" action="/events" method="GET">
        @foreach ($months as $month)
            <div class="w-25 d-flex justify-content-center form-group my-2">
                <label class="text-center form-check-label w-50" for="month"
                    style="font-size: 18px; letter-spacing: 1px; font-weight: 500">{{ $month->month }}</label>
                <input type="checkbox" class="w-25" name="month[]" value="{{ $month->monthNum }}" />
            </div>
        @endforeach
        <div class="w-100 justify-content-end d-flex my-2">
            <button type="submit" class="btn btn-dark w-25">Filter</button>
        </div>
    </form>
    <div class="d-flex w-75 pt-2 mx-auto my-3 flex-row bd-highlight justify-content-center"
        style="flex-wrap: wrap; border-top: 2px solid #ffffff">
        @if (count($events) == 0)
            <h3>There is no events at the moment.</h3>
        @else
            @foreach ($events as $item)
                @foreach ($item as $event)
                    <div class="card mx-3 my-2" style="width: 30rem; height: 450px">
                        <div class="cart-img-top w-100 h-50">
                            <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt=""
                                style="object-fit: cover">
                        </div>
                        <div class="card-body h-50 pb-0 d-flex flex-wrap">
                            <h5 class="card-title w-100 h-25 text-capitalize fw-bold">{{ $event->title }}</h5>
                            <h4 class="card-text w-100">Date:
                                {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
                            </h4>
                            <div class="btn_container d-flex mt-3 justify-content-end w-100 h-25">
                                <a href="{{ url('show/' . $event->id) }}" class="btn btn-primary"
                                    style="height: fit-content;">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>
@endsection
