@extends('backoffice.layout.main')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Qr Code</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Qr Code</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Qr Code</h3>

                    <div class="card-tools">
                        <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#generate">
                            <span class="fa fa-qrcode"></span> Generate
                        </button>
                        @include('backoffice.absensi-data.qrcode.modal.generate')

                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">

                            @if(session('generate'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Generate </strong>{{ session('generate') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($qrcode->count() > 0)
                                <div class="text-center">
                                    {!! $qrCode !!}
                                </div>
                            @else
                                <h4 class="text-center">Belum ada Qr Code</h4>
                            @endif

                            {{-- <div id="qr-reader" style="width:500px"></div>
                            <div id="qr-reader-results"></div>
                            <form action="/backoffice/absen" method="POST" id="form">
                                @csrf
                                <input type="hidden" name="qrcode" id="qrcode">
                            </form> --}}

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-6">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Absen {{ now()->locale('ID')->isoFormat('dddd, D MMMM YYYY') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">

                    <div class="row">
                        
                        <div class="col-md-12">
                            @if(session('masuk'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Masuk </strong>{{ session('masuk') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            @if(session('pulang'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Pulang </strong>{{ session('pulang') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(session('sukses'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sukses </strong>{{ session('sukses') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                
                            @if(session('qrCodeInvalid'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Gagal </strong>{{ session('qrCodeInvalid') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                
                            <table class="table table-bordered table-hover text-center" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absens as $absen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $absen->user->name }}</td>
                                        <td>{{ $absen->jam_masuk }}</td>
                                        <td>{{ $absen->jam_pulang }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</section>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            
            // html5QrcodeScanner.clear().then(_ => {
            //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //     var USER_ID = {{ auth()->user()->id }};
            //     $.ajax({
            //         url: "{{url('/backoffice/absen')}}",
            //         type: 'POST', 
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         data: {
            //             _methode : "POST",
            //             _token: CSRF_TOKEN, 
            //             qr_code : id,
            //             user_id : USER_ID
            //         },            
            //         success: function (response) { 
            //             console.log(response);
            //             if(response.status == 201){
            //                 alert('berhasil');
            //             }else{
            //                 alert('gagal');
            //             }
            //         }
            //     });   
            // }).catch(error => {
            //     alert('something wrong');
            // });
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
</script>

@endsection