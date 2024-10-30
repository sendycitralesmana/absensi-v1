@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Absensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Absensi</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    {{-- <h3 class="card-title">Absensi</h3> --}}

                    <div class="row flex justify-content-between mt-2">
                        <form action="" class="form-inline">
                            <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                <h3 class="card-title">
                                    <b>Absensi</b>
                                </h3>
                            </div>
    
                            <div class="pl-4">
    
                            </div>
                            <div class="input-group input-group-sm">
                                <label for="">Cari: </label>
                                <label for="" class="ml-2">dari</label>
                                <input type="date" name="dariTgl" class="form-control ml-2" max="{{ date('Y-m-d') }}" @if ($dariTgl) value="{{ $dariTgl }}" @endif>
                                <label for="" class="ml-2">sampai</label>
                                <input type="date" name="sampaiTgl" class="form-control ml-2" max="{{ date('Y-m-d') }}" @if ($sampaiTgl) value="{{ $sampaiTgl }}" @endif>
                            </div>
                            
                            <div class="input-group ml-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
    
                            @if ($dariTgl)
                                <div class="input-group ml-2">
                                    <a href="/backoffice/absensi-data/absensi" class="btn btn-primary btn-sm" title="Refresh">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            @endif
    
                        </form>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @if ($dariTgl)
                        <div class="search">
                            <div class="text-center">
                                <span class="fa fa-search"></span> Hasil Pencarian dari: <b>
                                    @if ($dariTgl)
                                        {{ $dariTgl }}
                                    @endif
                                    @if ($sampaiTgl)
                                        sampai {{ $sampaiTgl }}
                                    @endif
                                </b>
                            </div>
                            <hr>
                        </div>
                    @endif
        
                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absens as $absen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absen->user->name }}</td>
                                <td>{{ $absen->jam_masuk }}</td>
                                <td>{{ $absen->jam_pulang }}</td>
                                <td>{{ $absen->status }}</td>
                                <td>{{ $absen->keterangan }}</td>
                                <td>{{ $absen->created_at->locale('ID')->isoFormat('dddd, D MMMM YYYY') }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $absen->id }}" title="Ubah">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $absen->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($absens as $absen)
                        @include('backoffice.absensi-data.absensi.modal.edit')
                        @include('backoffice.absensi-data.absensi.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</section>

@endsection