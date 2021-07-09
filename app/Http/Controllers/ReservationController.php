<?php

namespace App\Http\Controllers;

use App\Helper\HelperFunction;
use App\Models\Reservation;
use App\Http\Resources\ReservationCollection;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ReservationCollection(Reservation::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            HelperFunction::logInfo("START", __LINE__ ,__FUNCTION__, __FILE__);

            $reserve = new Reservation([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'number' => $request->get('number'),
                'reservation_date' => $request->get('reservation_date'),
                'notes' => $request->get('notes'),
            ]);
            $reserve->save();

            return response()->json(['error' => false]);
        } catch (\Throwable $th) {
            HelperFunction::logException($th);
            return response()->json([
                'error' => true,
                'message' => 'Internal server error occurred. Please try again later.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            HelperFunction::logInfo("START", __LINE__ ,__FUNCTION__, __FILE__);

            $reserve = Reservation::find($id);

            $reserve->update($request->all());

            return response()->json(['error' => false]);
        } catch (\Throwable $th) {
            HelperFunction::logException($th);
            return response()->json([
                'error' => true,
                'message' => 'Internal server error occurred. Please try again later.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            HelperFunction::logInfo("START", __LINE__ ,__FUNCTION__, __FILE__);

            $reserve = Reservation::find($id);

            $reserve->delete();

            return response()->json(['error' => false]);
        } catch (\Throwable $th) {
            HelperFunction::logException($th);
            return response()->json([
                'error' => true,
                'message' => 'Internal server error occurred. Please try again later.'
            ]);
        }
    }
}
