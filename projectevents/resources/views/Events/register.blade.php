@extends ('layouts.appMain')

@section('content')
    <a href="/event/{{ $event->id }}" class="btn btn-primary absolute-top ml-3 mt-3">Back to previous event</a>
    <h1 class="text-center my-5">Event Registration</h1>
    <div class="card w-75" style="margin: 30px auto;">
        <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt="" style="object-fit: cover">
        <div class="card-body">
            <h4 class="card-title w-75" style="color: #98acc1">{{ $event->title }}</h4>
            <p class="card-text" style="font-size: 18px;">
                <b>Event date:</b> {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
            </p>
            <p class="card-text" style="font-size: 18px;"><b>Address:</b> {{ $event->aadress }}</p>
            <p class="card-text" style="font-size: 18px;">{{ $event->description }}</p>
            <div class="border-top pt-2 position-relative pb-5">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @include('common.errors') 
                <p class="card-text text-center mb-3" style="font-size: 22px; color: #abb0b9">Event registration form</p>
                <form action="{{ url('event/' . $event->id . '/register') }}" method="POST" class="px-3 w-50 my-2 mx-auto">
                    @csrf
                    <div class="form-container my-2">
                        <label class="form-label" for="name">Your name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-container my-2">
                        <label class="form-label" for="email">Your email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-container my-2">
                        <label class="form-label" for="phone">Your phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter phone" required>
                    </div>
                    <div class="form-container my-2">
                        <label class="form-label" for="group_name">Your group name</label>
                        <input type="text" class="form-control" name="group_name" placeholder="Enter group name"
                            required>
                    </div>
                    <div class="form-container my-2">
                        <label class="form-label" for="members_number">Members number</label>
                        <input type="number" class="form-control" name="members_number" placeholder="Enter members number"
                            required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 position-absolute"
                        style="right: 0;">
                        Register for this event
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
