@php
    $IDSreservationsAjd = DB::table('reservationsajdvalidee')->pluck('id');
    $reservationsAjd = App\Reservation::find($IDSreservationsAjd);
    $reservationsAttente = App\Reservation::orderBy('updated_at')->get();
@endphp
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date & horaire</th>
            <th>Nombre de personne</th>
            <th>Info sup.</th>
            <th colspan="2">Nom & Prénom client</th>
            <th>Adresse Mail</th>
            <th>Télephone</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
        <tbody>
            <tr class="bg-light text-white">
                <td colspan="9"> Réservations Validée a partir d'aujourd'hui</td>
            </tr>
            @foreach($reservationsAjd as $reservation)
            @php
                $client = $reservation->client()->get();
                $datetime = new DateTime($reservation['horaire']);
                $date = $datetime->format('Y-m-d');
                $heure = $datetime->format('H-i-s');
                $ajd = date('Y-m-d');
            @endphp
                @if ($date == $ajd)
                <tr class="table-success">
                    <td>
                        Aujourd'hui - {{$heure}}
                    </td>   
                @else
                <tr class="">
                    <td>
                        {{$reservation['horaire']}}
                    </td>
                @endif
                <td>{{$reservation['nbDePersonnes']}}</td>
                <td>{{$reservation['information']}}</td>
                <td>{{$client[0]['nom']}}</td>
                <td>{{$client[0]['prenom']}}</td>
                <td>{{$client[0]['email']}}</td>
                <td>{{$client[0]['numero']}}</td>
                @if ($reservation['etat'] == 0)
                    <td>
                        <a href="{{route('reservation.validerReservation', $reservation['id'] )}}" class="btn btn-light">Valider</a>
                    </td>
                    <td>
                        <a href="{{route('reservation.refuserReservation', $reservation['id'] )}}" class="btn btn-light">Refuser</a>
                    </td>
                @else
                    <td></td>
                    <td></td>
                @endif
            </tr>
            @endforeach
            <tr class="bg-light text-white">
                <td colspan="9"> Réservations en attente</td>
            </tr>
            @foreach($reservationsAttente as $reservation)
            @php
                $client = $reservation->client()->get();
            @endphp
            <tr class="">
                <td>
                    {{$reservation['horaire']}}
                </td>
                <td>{{$reservation['nbDePersonnes']}}</td>
                <td>{{$reservation['information']}}</td>
                <td>{{$client[0]['nom']}}</td>
                <td>{{$client[0]['prenom']}}</td>
                <td>{{$client[0]['email']}}</td>
                <td>{{$client[0]['numero']}}</td>
                @if ($reservation['etat'] == 0)
                    <td>
                        <a href="{{route('reservation.validerReservation', $reservation['id'] )}}" class="btn btn-light">Valider</a>
                    </td>
                    <td>
                        <a href="{{route('reservation.refuserReservation', $reservation['id'] )}}" class="btn btn-light">Refuser</a>
                    </td>
                @else
                    <td></td>
                    <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    
</table>