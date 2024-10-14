@extends('karyawan.layout.main')
@section('content')
    <div class="profile-page">
        <div class="header">
            <div class="d-flex1 mb-3 mt-3">
                <div class="back-icon" onclick="history.back()" style="cursor: pointer">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.54789 12.4201L6.48689 13.4801L0.707891 7.70307C0.614736 7.6105 0.540808 7.50043 0.49036 7.37918C0.439912 7.25793 0.41394 7.1279 0.41394 6.99657C0.41394 6.86524 0.439912 6.73522 0.49036 6.61397C0.540808 6.49272 0.614736 6.38264 0.707891 6.29007L6.48689 0.510071L7.54689 1.57007L2.12289 6.99507L7.54789 12.4201Z"
                            fill="white" />
                    </svg>
                </div>
                <h2>Profil</h2>
            </div>
            <div class="profile-info">
                <div class="avatar">
                    <img src="{{ asset('assets/karyawan/img-new/prodil.png') }}" alt="">
                </div>
                <div class="user-details">
                    <h3>{{ Auth::user()->name }}</h3>
                    {{--  <span class="badge">Developer</span>  --}}
                </div>
            </div>
        </div>
        <div class="p-3">
            <form action="">
                <div class="form-group mb-3">
                    <label for="time-in" class="form-label">Nama Lengkap</label>
                    <input type="name" class="form-control" id="time-in">
                </div>
                <div class="form-group mb-3">
                    <label for="time-in" class="form-label">Divisi</label>
                    <input type="text" class="form-control" id="time-in">
                </div>
                <div class="sign-in mt-32">
                    <button type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection
