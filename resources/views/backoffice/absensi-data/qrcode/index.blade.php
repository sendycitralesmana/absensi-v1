@extends('backoffice.layout.main')

@section('content')

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

    {{-- <div id="qr-reader" style="width:500px"></div>
    <div id="qr-reader-results"></div> --}}

    <div class="col-lg-4 py-5">
        <div>
            <div class="card bg-white shadow rounded-3 p-3 border-0">
                @if (session()->has('success'))
                    
                @elseif (session()->has('error'))

                @endif

                <video id="preview"></video>

                <form action="" method="POST" id="form">
                    <input type="hidden" name="user_id" id="user_id">
                </form>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover text-center" id="example1">
        <thead>
            <tr>
                <th>#</th>
                <th>Peran</th>
                <th>Pengguna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

</section>

<script type="text/javascript" src="https:rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    // let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    // scanner.addListener('scan', function (content) {
    //   console.log(content);
    // });
    // Instascan.Camera.getCameras().then(function (cameras) {
    //   if (cameras.length > 0) {
    //     scanner.start(cameras[0]);
    //   } else {
    //     console.error('No cameras found.');
    //   }
    // }).catch(function (e) {
    //   console.error(e);
    // });
    // scanner.addListener('scan', function (content) {
    //     document.getElementById('user_id').value = content;
    //     document.getElementById('form').submit();
    // });
</script>

{{-- <script src="https://unpkg.com/html5-qrcode"></script>
<script>
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;

    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            // Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);
        }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
</script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/2.0.0-rc.4/instascan.min.js"></script> --}}

@endsection