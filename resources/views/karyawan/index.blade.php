@extends('karyawan.layout.main')
@section('content')
    <div class="profile-page">
        <div class="header">
            <h2 class="mb-3">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h2>
            <div class="profile-info">
                <div class="avatar">
                    <img src="{{ asset('assets/karyawan/img-new/prodil.png') }}" alt="">
                </div>
                <div class="user-details">
                    <h3>{{ Auth::user()->name }}</h3>
                    {{--  <span class="badge">Developer</span>  --}}
                </div>
            </div>

            <div class="time-info">
                <div class="time-item">
                    <p>Masuk</p>
                    <h1>07:54:18</h1>
                </div>
                <div class="time-item">
                    <p>Pulang</p>
                    <h1>05:10:51</h1>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('wfh') }}" class="wfh-button">WFH</a>
                <a href="{{ route('wfo') }}" class="wfo-button">WFO</a>
            </div>
        </div>



        @include('karyawan.layout.main-menu')

        <div class="time-tracker p-3">
            <h2>Time Tracker</h2>
            @foreach ($absens as $absen)
                <div class="tracker-item mb-3">
                    <div class="tracker-items">
                        <p>{{ $absen->created_at->locale('ID')->isoFormat('dddd, D MMMM YYYY') }}</p>
                        @if ($absen->status == 'WFH')
                            <h6>WFH</h6>
                        @endif
                    </div>
                    <div class="tracker-details mt-3">
                        <div class="masuk">
                            <p class="mb-2">Masuk</p>
                            <h3>{{ $absen->jam_masuk }}</h3>
                        </div>
                        <div class="pulang">
                            @if ($absen->status == 'WFO')
                                <p class="mb-2">Pulang</p>
                                <h3>{{ $absen->jam_pulang }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
