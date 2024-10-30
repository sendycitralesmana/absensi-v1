@extends('backoffice.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pengajuan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pengajuan</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">

                    {{-- <div class="row">
                        <h3 class="card-title">Pengajuan</h3>
                    </div> --}}

                    <div class="row flex justify-content-between mt-2">
                        <form action="" class="form-inline">
                            <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                <h3 class="card-title">
                                    <b>Pengajuan</b>
                                </h3>
                            </div>

                            <div class="pl-4">

                            </div>
                            {{-- <div class="input-group input-group-sm">
                                <label for="">Cari: </label>
                                <select name="searchRole" class="form-control ml-2" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Peran harus dipilih')">
                                    <option value="">-- Peran --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- submit --}}
                            {{-- <div class="input-group ml-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div> --}}

                            {{-- @if ($sRole)
                                <div class="input-group ml-2">
                                    <a href="/backoffice/pengajuan-data/pengajuan" class="btn btn-primary btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            @endif --}}

                        </form>
    
                        <div class="card-tools">
                            {{-- <a href="/backoffice/pengajuan/tambah" class="btn btn-success btn-sm" title="Tambah">
                                <i class="fas fa-plus"></i> Tambah
                            </a> --}}
                            <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                <span class="fa fa-plus"></span> Tambah
                            </button>
                            @include('backoffice.absensi-data.pengajuan.modal.tambah')
    
                            {{-- @if ($errors->any())
    
                            <script>
                                jQuery(function() {
                                    $('#tambah').modal('show');
                                });
                            </script>
    
                            @endif --}}
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil </strong>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    {{-- @if ($sRole)
                        <div class="search">
                            <div class="text-center">
                                <span class="fa fa-search"></span> Hasil Pencarian dari: <b>
                                    @if ($sRole)
                                        Peran
                                    @endif
                                    {{ $rolee->role }}
                                </b>
                            </div>
                            <hr>
                        </div>
                    @endif --}}

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($pengajuans as $key => $pengajuan)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $pengajuan->user->name }}</td>
                                <td>{{ $pengajuan->status }}</td>
                                <td>{{ $pengajuan->keterangan }}</td>
                                <td>{{ $pengajuan->tgl_mulai }}</td>
                                <td>{{ $pengajuan->tgl_selesai }}</td>
                                <td>
                                    {{-- <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#detail-{{ $pengajuan->id }}" title="Lihat detail">
                                        <i class="fa fa-eye"></i>
                                    </button> --}}
                                    {{-- @if ($pengajuan->id != Auth::pengajuan()->id)
                                        <a href="/backoffice/pengguna/admin/hapus/{{ $pengajuan->id }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif --}}
                                    {{-- @if (Auth::pengajuan()->role_id == 1 || Auth::pengajuan()->role_id == 2)
                                        @if ($pengajuan->role_id != 1)
                                        @endif
                                        @endif --}}
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $pengajuan->id }}" title="Ubah">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    {{-- @if ($pengajuan->id != Auth::pengajuan()->id)
                                    @endif --}}
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $pengajuan->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($pengajuans as $pengajuan)
                        @include('backoffice.absensi-data.pengajuan.modal.delete')
                        @include('backoffice.absensi-data.pengajuan.modal.edit')
                        {{-- @include('backoffice.pengajuan-data.pengajuan.modal.detail') --}}
                    @endforeach

                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            // munculkan toast.fire tanpa harus di click
            document.addEventListener('DOMContentLoaded', () => {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
      
            // $('.swalDefaultSuccess').click(function () {
            //   Toast.fire({
            //     icon: 'success',
            //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            //   })
            // });
          });
      </script>

</section>

@endsection