<h1>RASA User Dashboard</h1>

<hr>

@if($house)

    <h2>Rumah {{ $house->elderly_name }}</h2>

    <p>Alamat: {{ $house->address }}</p>

    <p>Total Perangkat: {{ $totalDevices }}</p>

    <p>Alert Belum Dibaca: {{ $unreadAlerts }}</p>

    @if($latestReading)

        <h3>Monitoring Terakhir</h3>

        <p>
            Tegangan:
            {{ $latestReading->voltage }} V
        </p>

        <p>
            Arus:
            {{ $latestReading->current }} A
        </p>

        <p>
            Daya:
            {{ $latestReading->power }} W
        </p>

    @endif

@else

    <p>Data rumah belum tersedia.</p>

@endif