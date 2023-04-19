<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listLimit()
    {
        $events = Event::orderBy('date_event', 'DESC')-> take(3)->get();
        return view('main', compact('events'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('date_event', 'desc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_event' => 'required',
            'aadress' => 'required',
        ]);
        $data = $request->all(); //данные, переданы формой
        $filename = $request->file('image')->getClientOriginalName(); //имя файла картинки
        $data['image'] = $filename; // записали имя файла для бд
        Event::create($data); //добавили данные базу(INSERT)
        //*------------------ закачка картинки root/images/
        $file = $request->file('image'); //путь исходной картинки
        if ($filename) {
            $file->move('../public/images/', $filename); //загрузка изоброжения
        }
        return redirect('/eventlist'); //возврат к списку мероприятий

    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_event' => 'required',
            'aadress' => 'required',
        ]);

        $data = $request->all(); //данные, переданы формой
        if ($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName(); //имя файла картинки
            $data['image'] = $filename; // записали имя файла для бд
        }
        //*------------------ закачка картинки root/images/
        $file = $request->file('image'); //путь исходной картинки
        if ($filename) {
            $file->move('../public/images/', $filename); //загрузка изобрaжения
        }
        $event->update($data); //update data
        return redirect('/eventlist'); //возврат к списку мероприятий
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/eventlist');
    }
}
