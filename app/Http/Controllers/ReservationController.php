<?php

namespace App\Http\Controllers;

use App\reservation;
use App\Client;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

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
        $request->validate([
            'nom' => 'required|max:50|string',
            'prenom' => 'required|max:50|string',
            'email' => 'required|max:50|email:rfc,dns',
            'numero' => 'required|regex:/(0)[0-9]{9}/',
            'horaire' => 'required|date',
            'nbDePersonne' => 'integer|min:1'
        ]);

        $reservation = new Reservation();
        $client = new Client();

        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->email = $request->input('email');
        $client->numero = $request->input('numero');

        $client = Client::updateOrCreate(
            ['email' => $client['email'], 'numero' => $client['numero']],
            ['nom' => $client['nom'], 'prenom' => $client['nom']]
        );

        $reservation->horaire = $request->input('horaire');
        $reservation->nbDePersonnes = $request->input('nbDePersonnes');
        $reservation->information = $request->input('information');
        $reservation->client_id = $client['id'];

        $reservation->save();

        return redirect('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation $reservation)
    {
        //
    }
}
