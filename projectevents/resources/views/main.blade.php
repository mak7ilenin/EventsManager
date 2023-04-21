@extends('layouts.appMain')

@section('content')
    <h1 class="text-center mb-5 mt-5">Upcoming events</h1>
    <div class="d-flex flex-row flex-wrap bd-highlight mb-3 justify-content-center">
        @foreach ($events as $event)
            <div class="card ml-3 mr-3 my-3" style="width: 30rem; height: 450px">
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
                        <a href="{{url('event/'.$event->id)}}" 
                            class="btn btn-primary"
                            style="height: fit-content;">
                            Read more
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
