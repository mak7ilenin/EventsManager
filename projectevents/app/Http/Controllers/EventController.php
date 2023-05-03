<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RegisterEvents;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventController extends Controller
{
    public function listLimit()
    {
        $events = Event::orderBy('date_event', 'DESC')->take(3)->get();
        // GET AMOUNT OF REGISTERED MEMBERS
        $count_members = array();
        foreach ($events as $event) {
            $count_members[] = RegisterEvents::orderBy('events_id')
                ->where('events_id', '=', $event->id)
                ->count();
        }
        return view('main', compact('events', 'count_members'));
    }
    public function allEvents(Request $request)
    {
        // SEARCH FUNCTION
        if ($request->input('search') != null) {
            $search = $request->input('search');
            $events = Event::orderBy('date_event', 'DESC')
                ->where('title', 'like', '%' . $search . '%')
                ->get();
        }
        // MONTHS FILTER FUNCTION
        else if ($request->input('month') != null) {
            $reqMonths = $request->input('month');
            $events = Event::whereIn(DB::raw("MONTH(date_event)"), $reqMonths)->get();
        }
        // ALL EVENTS RENDER
        else {
            $events = Event::orderBy('date_event', 'desc')->get();
        }
        // GET ALL USED MONTHS BY EVENTS
        $months = DB::table('events')
            ->distinct()
            ->select(DB::raw('MONTHNAME(date_event) AS month, MONTH(date_event) as monthNum'))
            ->orderBy('date_event', 'DESC')
            ->get();
        
        // GET AMOUNT OF REGISTERED MEMBERS
        $count_members = array();
        foreach ($events as $event) {
            $count_members[] = RegisterEvents::orderBy('events_id')
                ->where('events_id', '=', $event->id)
                ->count();
        }
        return view('events', compact('events', 'months', 'count_members'));
    }
    public function registration(Event $event)
    {
        return view('events.register', compact('event'));
    }
    public function register(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
            'members_number' => 'required|numeric|max:1000',
        ]);
        RegisterEvents::create([
            'contact_person' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'group_name' => $request->group_name,
            'number_members' => $request->members_number,
            'events_id' => rtrim($event->id),
        ]);
        return view('events.registerResult', compact('event', 'request'));
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
        // $startDate = Carbon::parse($event->date_event);
        // $endDate = Carbon::parse(Carbon::now());
  
        // $diffInDays = $startDate->diffInDays($endDate);
        // $diffInMonths = $startDate->diffInMonths($endDate);
        // $diffInYears = $startDate->diffInYears($endDate);
        // $updated_at = "$diffInYears years $diffInMonths months $diffInDays days";
        
        $count_members = RegisterEvents::orderBy('events_id')
            ->where('events_id', '=', $event->id)
            ->count();

        $updateDate = $event->updated_at;
        $date = new Carbon($updateDate);
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $currentDay = now()->day;

        $year = null;
        $month = null;
        $day = null;

        if ($date->year < $currentYear) {
            $year = $currentYear - $date->year;
        }
        if ($date->month < $currentMonth) {
            $month = $currentMonth - $date->month;
        }
        if ($date->day < $currentYear) {
            $day = $currentDay - $date->day;
        }

        if ($year == null && $month == null && $day == null) {
            $updated_at = "Today";
        } else if ($year != null) {
            if ($year > 1) {
                $updated_at = "$year years ago";
            } else {
                $updated_at = "$year year ago";
            }
            return view('events.detail', compact('event', 'updated_at', 'count_members'));
        } else if ($month != null) {
            if ($month > 1) {
                $updated_at = "$month months ago";
            } else {
                $updated_at = "$month month ago";
            }
            return view('events.detail', compact('event', 'updated_at', 'count_members'));
        } else if ($day != null) {
            if ($day > 1) {
                $weekDiff = (int)($day / 7);
                if ($weekDiff > 0) {
                    if ($weekDiff == 1) {
                        $updated_at = "$weekDiff week ago";
                    } else {
                        $updated_at = "$weekDiff weeks ago";
                    }
                } else {
                    $updated_at = "$day days ago";
                }
            } else {
                $updated_at = "Yesterday";
            }
        }
        return view('events.detail', compact('event', 'updated_at', 'count_members'));
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