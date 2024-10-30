<div class="modal fade" id="edit-{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/absensi-data/pengajuan/{{ $pengajuan->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Peran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="role">Peran <span class="text-danger">*</span></label>
                                <select name="role" id="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }} select2">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $pengajuan->role_id == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <small class="text-danger">{{ $errors->first('role') }}</small>
                                @endif
                            </div> --}}


                            <div class="form-group">
                                <label for="user">Karyawan <span class="text-danger">*</span></label>
                                <select name="user_id" id="user" class="form-control {{ $errors->has('user') ? 'is-invalid' : '' }} select2">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $pengajuan->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user'))
                                <small class="text-danger">{{ $errors->first('user') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }} select2">
                                    <option value="">-- Pilih --</option>
                                    <option value="Cuti" {{ $pengajuan->status == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                                    <option value="Izin" {{ $pengajuan->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                                    <option value="Sakit" {{ $pengajuan->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                </select>
                                @if($errors->has('status'))
                                <small class="help-block" style="color: red">{{ $errors->first('status') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}">{{ $pengajuan->keterangan }}</textarea>
                                @if($errors->has('keterangan'))
                                <small class="help-block" style="color: red">{{ $errors->first('keterangan') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date"  name="tgl_mulai" class="form-control @if($errors->has('tgl_mulai')) is-invalid @endif" placeholder="Nama" value="{{ $pengajuan->tgl_mulai }}"
                                oninvalid="this.setCustomValidity('Nama harus diisi')"
                                oninput="this.setCustomValidity('')">
                                @if($errors->has('tgl_mulai'))
                                <small class="help-block" style="color: red">{{ $errors->first('tgl_mulai') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai <span class="text-danger">*</span></label>
                                <input type="date"  name="tgl_selesai" class="form-control @if($errors->has('tgl_selesai')) is-invalid @endif" placeholder="Nama" value="{{ $pengajuan->tgl_selesai }}"
                                oninvalid="this.setCustomValidity('Nama harus diisi')"
                                oninput="this.setCustomValidity('')">
                                @if($errors->has('tgl_selesai'))
                                <small class="help-block" style="color: red">{{ $errors->first('tgl_selesai') }}</small>
                                @endif
                            </div>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewImg() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>
{{--  --}}