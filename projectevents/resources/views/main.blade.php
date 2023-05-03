@extends('layouts.appMain')

@section('content')
    <h1 class="text-center mb-5 mt-5">Upcoming events</h1>
    <div class="d-flex w-75 pt-2 mx-auto my-3 flex-row bd-highlight justify-content-center"
        style="flex-wrap: wrap; border-top: 2px solid #ffffff">
        @if (count($events) == 0)
            <h3 class="my-3">There is no events at the moment.</h3>
        @else
            @foreach ($events as $key => $event)
                <div class="card mx-3 my-3" style="width: 30rem; height: 550px; box-shadow: 0 0 20px -2px #000">
                    <div class="cart-img-top w-100" style="height: 65%">
                        <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt=""
                            style="object-fit: cover">
                    </div>
                    <div class="card-body pb-0 d-flex flex-wrap" style="height: 35%">
                        <h5 class="card-title w-100 text-capitalize fw-bold text-center" style="font-size: 24px;">
                            {{ $event->title }}</h5>
                        <h4 class="card-text w-100 text-center">
                            {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
                        </h4>
                        <p class="card-text text-center w-100 mb-1" style="font-size: 22px;">
                            @if ($count_members[$key] == 0)
                                Registered users: No one
                            @else
                                Registered users: {{ $count_members[$key] }} people
                            @endif
                        </p>
                        <div class="btn_container w-100 mb-2 mt-1">
                            <a href="{{ url('event/' . $event->id) }}" class="btn btn-primary w-100"
                                style="height: fit-content; font-size: 19px">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="w-100 mt-2 mb-4 d-flex justify-content-center align-items-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                @for ($i = 0; $i < count($pages); $i++)
                    <p>{{$pages[$i]->id}}</p>
                @endfor

                @for ($i = 0; $i < count($events); $i++)
                    <li class="page-item">
                        <button type="submit" formaction="{{ url('events?page=' . $i . '') }}"
                            class="page-link m-0">1</button>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
