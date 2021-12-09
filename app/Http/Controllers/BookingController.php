<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book)
    {
        //
        $data['table'] = $book;
        date_default_timezone_set('Asia/Dhaka');
        $data['books'] = Booking::where('table_id', $book)->where('date', date('Y-m-d'))->get();

        return view('booking.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_set('Asia/Dhaka');
        $now = date('H:i:s');
        $startTime = $request->start_time;
        $endTime = $request->end_time;
        $startTime = $request->start_time;
        $endTime = $request->end_time;
        $existingSlot = Bookings::where(function($query) use ($startTime,$endTime) {
            $query->where('start_time','>=',$startTime)->where('end_time','<=',$endTime);
        })->orWhere(function($query) use ($startTime,$endTime) {
            $query->where('start_time','<=',$startTime)->where('end_time','>=',$startTime);
        })->orWhere(function($query) use ($startTime,$endTime) {
            $query->where('start_time','<=',$endTime)->where('end_time','>=',$endTime);
        })->orWhere(function($query) use ($startTime,$endTime) {
            $query->where('start_time','<=',$startTime)->where('end_time','>=',$endTime);
        })->first();

        $data = [
            'table_id' => $request->tables_id,
            'users_id' => Auth::user()->id,
            'start_time'=> $request->start_time,
            'end_time'=> $request->end_time,
        ];
        $newBooking = Bookings::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
