@extends('karyawan.layout.main')
@section('content')
    <style>
        .radio-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 20px;
            max-width: 400px;
            margin: 20px auto;
        }

        .radio-group input[type="radio"] {
            display: none;
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
        }

        #hadir+label {
            border-color: #28a745;
            color: #28a745;
        }

        #telat+label {
            border-color: #ffc107;
            color: #ffc107;
        }

        #tidak-hadir+label {
            border-color: #dc3545;
            color: #dc3545;
        }

        #izin+label {
            border-color: #17a2b8;
            color: #17a2b8;
        }

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
                    <h3>{{ Auth::user()->name }}</h3>
                    {{--  <span class="badge">Developer</span>  --}}
                </div>
            </div>
        </div>
        @include('karyawan.layout.main-menu')
        <div class="wfo-choice">
            <form action="">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-3">
                    <div id="qr-reader" style="width:100%"></div>
                    <div id="qr-reader-results"></div>
                </div>
                {{-- <div class="sign-in mt-32">
                    <button type="submit">Absen</button>
                </div> --}}
                <div class="sign-in mt-2 mb-3">
                    <a href="{{ route('index') }}">Kembali</a>
                </div>
            </form>

            <form action="/karyawan/absen" method="POST" id="form">
                @csrf
                <input type="hidden" name="qrcode" id="qrcode">
            </form>

        </div>
    </div>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                console.log(`Scan result ${decodedText}`, decodedResult);
            }

            $('#result').val(decodedText);
            let id = decodedText;

            html5QrcodeScanner.clear().then(_ => {
                document.getElementById('qrcode').value = id;
                document.getElementById('form').submit();
            });
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            });

        html5QrcodeScanner.render(onScanSuccess);

        html5QrcodeScanner.start(
            { facingMode: { exact: "environment" } },
            { fps: 10, qrbox: 250 },
            onScanSuccess
        );

        document.querySelector('.html5-qrcode-button-camera-stop').style.display = 'inline-block';
        document.querySelector('.html5-qrcode-camera-selector').style.display = 'none';
    </script>
@endsection
