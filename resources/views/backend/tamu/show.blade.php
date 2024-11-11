<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {!! html()->span()->text("Nama Lengkap:")->class("control-label") !!}
                    {!! html()->p($data->nama) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("NIK :")->class("control-label") !!}
                    {!! html()->p($data->nik) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Tempat Lahir :")->class("control-label") !!}
                    {!! html()->p($data->tempat_lahir) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Tanggal Lahir :")->class("control-label") !!}
                    {!! html()->p($data->tanggal_lahir) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Email :")->class("control-label") !!}
                    {!! html()->p($data->email) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("No Hp :")->class("control-label") !!}
                    {!! html()->p($data->no_hp) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Alamat :")->class("control-label") !!}
                    {!! html()->p($data->alamat) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Jabatan :")->class("control-label") !!}
                    {!! html()->p($data->jabatan) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Dari :")->class("control-label") !!}
                    {!! html()->p($data->dari) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Keperluan :")->class("control-label") !!}
                    {!! html()->p($data->keperluan) !!}
                </div>
                <div class="form-group">
                    {!! html()->span()->text("Tujuan :")->class("control-label") !!}
                    {!! html()->p($data->unor->nama) !!}
                </div>
            </div>
            @if($data->file)
                <div class="col-md-4">
                    <div class="box shadow-sm">
                        <div class="box-body text-center">
                            <img src="{{ $data->file->link_stream }}" alt="{{ $data->nama }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.submit-data').hide();
    $('.modal-title').html('<i class="fa fa-search"></i> Detail Data {!! $page->title !!}');
</script>
