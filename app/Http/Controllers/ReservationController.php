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
        $reservation->etat = $request->input('etat');
        $reservation->client_id = $client['id'];

        $reservation->save();

        return redirect('');
    }

    public function validerReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->etat = 1;
        //Envoyer mail valider
        $reservation->save();

        return redirect('home');
    }

    public function refuserReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->etat = 2;
        //Envoyer mail valider
        $reservation->save();

        return redirect('home');
    }

    public function updateState($id, $state)
    {
        $reservation = Reservation::find($id);
        $reservation->etat = $state;
        $reservation->save();

        return redirect('home');
    }
}
