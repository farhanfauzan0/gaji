<div class="col-md-12">
    <form action="{{ route('jabatan.update', ['jabatan' => $data->id]) }}" method="post" class="login_validator">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label for="email" class="col-form-label"> Nama Jabatan</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-bars text-primary"></i></span>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <input type="text" class="form-control  form-control-md" value="{{ $data->nama }}" name="nama"
                    placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Gaji Harian</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-money text-primary"></i></span>
                <input type="text" class="form-control  form-control-md" value="{{ $data->per_hari }}" name="per_hari"
                    placeholder="Gaji Harian" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Lemburan</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-money text-primary"></i></span>
                <input type="text" class="form-control  form-control-md" value="{{ $data->lemburan }}" name="lemburan"
                    placeholder="Lemburan" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label"> Gaji per Bulan</label>
            <div class="input-group">
                <span class="input-group-addon input_email"><i class="fa fa-money text-primary"></i></span>
                <input type="text" class="form-control  form-control-md" value="{{ $data->gaji_bulan }}"
                    name="gaji_bulan" placeholder="Gaji per Bulan" required>
            </div>
        </div>
        <button class="btn btn-info" type="submit">Simpan</button>
    </form>
</div>
