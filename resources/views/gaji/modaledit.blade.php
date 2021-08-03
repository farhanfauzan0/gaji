<div class="col-md-12">
    <form action="{{ route('karyawan.update', ['karyawan' => $data->id]) }}" method="post" class="login_validator">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label for="email" class="col-form-label"> Nama</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->nama }}" name="nama"
                    placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Jenis Kelamin</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-mars text-primary"></i></span>
                <select class="form-control form-control-md" id="jenis_kelamin" name="jenis_kelamin">
                    <option selected disabled>-- Pilih Jenis Kelamin --</option>
                    <option {{ $data->jenis_kelamin == 'laki-laki' ? 'selected' : '' }} value="laki-laki">Laki-laki
                    </option>
                    <option {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Jabatan</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-bars text-primary"></i></span>
                <select class="form-control form-control-md" id="jabatan" name="jabatan">
                    <option selected disabled>-- Pilih Jabatan --</option>
                    @foreach ($dataj as $datajabatans)
                        <option {{ $data->id_jabatan == $datajabatans->id ? 'selected' : '' }}
                            value="{{ $datajabatans->id }}">
                            {{ $datajabatans->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-info" type="submit">Simpan</button>
    </form>
</div>
