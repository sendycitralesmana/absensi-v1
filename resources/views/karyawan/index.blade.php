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
                <h3>Dwi Sintia</h3>
                <span class="badge">Developer</span>
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

    <div class="time-tracker">
        <h2>Time Tracker</h2>
        <div class="tracker-item">
            <p>Thursday, 18 January</p>
            <div class="tracker-details">
                <div class="masuk">
                    <p class="mb-2">Masuk</p>
                    <h3>07:54:16</h3>
                </div>
                <div class="pulang">
                    <p class="mb-2">Pulang</p>
                    <h3>17:08:56</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
