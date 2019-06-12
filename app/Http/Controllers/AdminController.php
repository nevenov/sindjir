<?php

namespace Sinjirite\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Sinjirite\CalendarEvent;
use Sinjirite\Http\Requests;
use Sinjirite\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index(){
        return redirect('admin/reservations');
    }

    public function reservations()
    {
        return view('admin.reservations');
    }

    public function getReservations(Request $request)
    {
        if ($request->ajax()) {

            $start = strtotime($request->input('start'));
            $end = strtotime($request->input('end'));

            $select = DB::raw("
                id,
                FROM_UNIXTIME(start_date, '%Y-%m-%d') AS start,
                FROM_UNIXTIME(end_date, '%Y-%m-%d') AS end,
                title, all_day AS allDay, type, color, comment
            ");

            $reservations = DB::table('calendar')
                ->select($select)
                ->where('start_date', '>=', $start)
                ->where('end_date', '<=', $end)
                ->get();

            return \Response::json($reservations);
        }

        return false;
    }

    public function newReservationForm(Request $request)
    {
        if ($request->ajax()) {

            $start = $request->input('start_date');
            $endRaw = $request->input('end_date');
            $end = $endRaw - 24*60*60;

            $reservations = DB::table('calendar')
                ->select('type')
                ->distinct()
                ->whereRaw('start_date <= ? AND end_date - 24*60*60 >= ?', [$end, $start])
                ->get();

            $allTypes = CalendarEvent::$types;

            if ($reservations) {
                foreach ($reservations as $reservation) {
                    $allTypes = array_except($allTypes, $reservation->type);
                }
                $availableReservations = $allTypes;
            } else {
                $availableReservations = $allTypes;
            }

            return view('admin.partials.new_reservation_form', compact(['availableReservations', 'start', 'endRaw']));
        }

        return false;
    }

    public function makeReservation(Request $request)
    {
        if ($request->ajax()) {

            $types = $request->input('types');
            $reservations = collect();

            if ($types) {

                foreach ($types as $type) {
                    $reservation = new CalendarEvent();
                    $reservation->title = CalendarEvent::$types[$type]['title'];
                    $reservation->start_date = $request->input('start_date');
                    $reservation->end_date = $request->input('end_date');
                    $reservation->all_day = true;
                    $reservation->type = $type;
                    $reservation->color = CalendarEvent::$types[$type]['color'];
                    $reservation->save();

                    $reservations->push($reservation);
                }

                return response()->json($reservations);
            } else {
                return response()->json(['message' => 'noTypes']);
            }
        }

        return false;
    }

    public function updateReservation(Request $request)
    {
        if ($request->ajax()) {

            date_default_timezone_set('UTC');

            $id = $request->input('id');
            $startDate = strtotime(new Carbon($request->input('start_date')));
            $endDate = strtotime(new Carbon($request->input('end_date'))) + 24*60*60;
            $comment = $request->input('comment');

            $reservation = CalendarEvent::find($id);
            $reservation->start_date = $startDate;
            $reservation->end_date = $endDate;
            $reservation->comment = $comment;

            $reservationExist = DB::table('calendar')
                ->select('id')
                ->distinct()
                ->whereRaw("type = ? AND start_date <= ? AND end_date - 24*60*60 >= ? AND id <> ?", [$reservation->type, $endDate - 24*60*60, $startDate, $reservation->id])
                ->get();


            if ($reservationExist) {

                return response()->json(['message' => 'exist', 'title' => $reservation->title]);

            } else if ($endDate <= $startDate) {

                return response()->json(['message' => 'smallerEndDate']);

            } else {

                if ($reservation->save()) {

                    $startDate = $reservation->start_date;
                    $endDate = $reservation->end_date;

                    return  response()->json([
                        'message' => 'success',
                        'id' => $id,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'comment' => $comment
                    ]);

                }
            }
        }

        return false;
    }

    public function deleteReservation(Request $request)
    {
        if ($request->ajax()) {

            $id = $request->input('id');
            $reservation = CalendarEvent::find($id);

            if ($reservation->delete()) {
                return  response()->json(['message' => 'success', 'id' => $id]);
            }
        }

        return false;
    }
}