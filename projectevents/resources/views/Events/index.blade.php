@extends ('layouts.app')

@section('content')
<div class="x_title">
    <h2>Events manage</h2>
    <div class="clearfix"></div>
</div>

<div class="x_content">
    <div class="demo-container" style="min-height: 250px;">
        <a href="addevent" class="btn btn-primary btn-sm btn-flat">
            <i class="fa fa-plus"></i> New</a>


        @if (count($events ?? '') > 0)
        <table id="database" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="10%">NN</th>
                    <th width="20%">Title</th>
                    <th width="10%">Date</th>
                    <th width="50%">Location</th>
                    <th width="10%">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->date_event}}</td>
                    <td>{{$event->aadress}}</td>
                    <td>{{$event->description}}</td>
                    <td>
                        <form action="{{ url('eventlist/'.$event->id)}}" method="POST">
                            <a href="{{url('editevent/'.$event->id)}}" title="edit">
                                <i class="fa fa-btn fa-edit"></i>
                            </a>

                            {{ csrf_field()}}
                            {{method_field('DELETE')}}
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-link">
                                <i class="fa fa-btn fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Data is empty</p>
        @endif
    </div>
</div>
@endsection