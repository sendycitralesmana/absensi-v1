@extends('karyawan.layout.main')
@section('content')
    <style>
        .radio-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Dua kolom */
            grid-template-rows: auto auto;
            /* Dua baris */
            gap: 20px;
            /* Jarak antar elemen */
            max-width: 400px;
            /* Lebar maksimal */
            margin: 20px auto;
        }

        .radio-group input[type="radio"] {
            display: none;
            /* Sembunyikan input asli */
        }

        .radio-group label {
            padding: 10px 20px;
            border: 2px solid;
            border-radius: 8px;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            text-align: center;
            min-width: 120px;
            /* Lebar minimal untuk label */
        }

        /* Warna default untuk setiap label */
        #hadir+label {
            border-color: #28a745;
            /* Hijau untuk hadir */
            color: #28a745;
        }

        #telat+label {
            border-color: #ffc107;
            /* Kuning untuk telat */
            color: #ffc107;
        }

        #tidak-hadir+label {
            border-color: #dc3545;
            /* Merah untuk tidak hadir */
            color: #dc3545;
        }

        #izin+label {
            border-color: #17a2b8;
            /* Biru untuk izin */
            color: #17a2b8;
        }

        /* Gaya untuk radio button terpilih */
        #hadir:checked+label {
            background-color: #28a745;
            color: white;
        }

        #telat:checked+label {
            background-color: #ffc107;
            color: white;
        }

        #tidak-hadir:checked+label {
            background-color: #dc3545;
            color: white;
        }

        #izin:checked+label {
            background-color: #17a2b8;
            color: white;
        }

        .radio-group label:hover {
            opacity: 0.8;
        }
    </style>

    <div class="profile-page">
        <div class="header">
            <h2 class="mb-3">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h2>
            <div class="profile-info">
                <div class="avatar">
                    <img src="{{ asset('assets/karyawan/img-new/prodil.png') }}" alt="Profile Picture">
                </div>
                <div class="user-details">
                    <h3>Dwi Sintia</h3>
                    <span class="badge">Developer</span>
                </div>
            </div>

        </div>
        @include('karyawan.layout.main-menu')
        </div>
        <div class="wfh-choice d-flex aling-items-center justify-content-center">
            <form action="">
                <div class="radio-grid">
                    <div class="radio-group">
                        <input type="radio" id="hadir" name="wfo" value="hadir">
                        <label for="hadir">Hadir</label>
                    </div>
                    <div class="radio-group">
                        <input type="radio" id="telat" name="wfo" value="telat">
                        <label for="telat">Terlambat</label>
                    </div>
                    <div class="radio-group">
                        <input type="radio" id="tidak-hadir" name="wfo" value="tidak-hadir">
                        <label for="tidak-hadir">Tidak Hadir</label>
                    </div>
                    <div class="radio-group">
                        <input type="radio" id="izin" name="wfo" value="izin">
                        <label for="izin">Izin</label>
                    </div>
                </div>

                <div class="sign-in mt-32">
                    <button type="submit">Kirim</button>
                </div>
                <div class="sign-in mt-2 mb-3">
                    <a href="{{ route('index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
