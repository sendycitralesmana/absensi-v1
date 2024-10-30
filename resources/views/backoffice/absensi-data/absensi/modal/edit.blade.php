<div class="modal fade" id="edit-{{ $absen->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/absensi-data/absensi/{{ $absen->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Absen - {{ $absen->user->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">

                            <h3>{{ $absen->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h3>
                            <hr>

                            <div class="form-group">
                                <label>Jam Masuk <span class="text-danger">*</span></label>
                                <input type="time"  name="jam_masuk" class="form-control @if($errors->has('jam_masuk')) is-invalid @endif" value="{{ $absen->jam_masuk }}"
                                required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Peran harus diisi')">
                                @if($errors->has('jam_masuk'))
                                <small class="help-block" style="color: red">{{ $errors->first('jam_masuk') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Jam Pulang <span class="text-danger">*</span></label>
                                <input type="time"  name="jam_pulang" class="form-control @if($errors->has('jam_pulang')) is-invalid @endif" value="{{ $absen->jam_pulang }}"
                                required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Peran harus diisi')">
                                @if($errors->has('jam_pulang'))
                                <small class="help-block" style="color: red">{{ $errors->first('jam_pulang') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="status" class="form-control @if($errors->has('status')) is-invalid @endif" value="{{ $absen->status }}"
                                required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Peran harus diisi')"> --}}
                                <select name="status" class="form-control">
                                    <option value="WFO" @if($absen->status == 'WFO') selected @endif>WFO</option>
                                    <option value="WFH" @if($absen->status == 'WFH') selected @endif>WFH</option>
                                    <option value="IZIN" @if($absen->status == 'IZIN') selected @endif>IZIN</option>
                                    <option value="SAKIT" @if($absen->status == 'SAKIT') selected @endif>SAKIT</option>
                                </select>
                                @if($errors->has('status'))
                                <small class="help-block" style="color: red">{{ $errors->first('status') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control @if($errors->has('status')) is-invalid @endif">{{ $absen->keterangan }}</textarea>
                                @if($errors->has('status'))
                                <small class="help-block" style="color: red">{{ $errors->first('status') }}</small>
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