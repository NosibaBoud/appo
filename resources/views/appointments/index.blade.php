<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
</head>
<body>
    <h1>All Appointments</h1>

    @foreach ($users as $user)
        <h2>{{ $user->name }}</h2>
        <h3>Investigations:</h3>
        @foreach ($user->mytests as $mytests)
            <h4>Investigation: {{ $mytests->investigation->name }}</h4>
        @endforeach
        
        <h3>Appointments:</h3>
        <ul>
            @foreach ($user->homeAppointments as $appointment)
                <li>
                    <strong>{{ $appointment->first_name }} {{ $appointment->last_name }}</strong><br>
                    Email: {{ $appointment->email }}<br>
                    Address: {{ $appointment->address }}<br>
                    Phone: {{ $appointment->phone_number }}<br>
                    Date: {{ $appointment->date }} at {{ $appointment->time }}<br>
                    Gender: {{ $appointment->gender }}
                </li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
