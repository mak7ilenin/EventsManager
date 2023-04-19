@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Events manage - Edit event</h2>
    <div class="clearfix"></div>
</div>

<div class="x_content">
    <div class="demo-container">
        <a href="/eventlist" class="btn btn-primary btn-sm btn-flat">
            <i class="fa fa-backward"></i> Back to list</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('editevent/'.$event->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{$event->title}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Event:</strong>
                    <input type="text" name="date_event" class="form-control" placeholder="Date Event" value="{{$event->date_event}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aadress:</strong>
                    <input type="text" name="aadress" class="form-control" placeholder="Aadress" value="{{$event->aadress}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea type="text" style="height: 50px;" name="description" class="form-control" placeholder="Description">{{$event->description}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>OldImage:</strong>
                    @if ($event->image!="")
                    <img src="{{asset('images/'.$event->image)}}" class="img-thumbnail" alt="{{$event->image}}" width="104" height="136"/>
                    @else
                    <p>No Image</p>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" value="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update event</button>
            </div>
            </form>
    </div>
</div>

@endsection