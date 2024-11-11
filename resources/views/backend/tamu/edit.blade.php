{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body row">
        <div class="col-md-6">
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('nama')->text('Nama') !!}
                {!! html()->text('nama',$data->nama)->placeholder('Type Nama here')->class('form-control')->id('nama') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('nik')->text('Nik') !!}
                {!! html()->text('nik',$data->nik)->placeholder('Type Nik here')->class('form-control')->id('nik') !!}
            </div>
            <div class="row">
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('tempat_lahir')->text('Tempat Lahir') !!}
                    {!! html()->text('tempat_lahir',$data->tempat_lahir)->placeholder('Type Tempat Lahir here')->class('form-control')->id('tempat_lahir') !!}
                </div>
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('tanggal_lahir')->text('Tanggal Lahir') !!}
                    {!! html()->date('tanggal_lahir',$data->tanggal_lahir)->class('form-control')->id('tanggal_lahir') !!}
                </div>
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('email')->text('Email') !!}
                {!! html()->email('email',$data->email)->class('form-control')->id('email') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('no_hp')->text('No Hp') !!}
                {!! html()->text('no_hp',$data->no_hp)->placeholder('Type No Hp here')->class('form-control')->id('no_hp') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('alamat')->text('Alamat') !!}
                {!! html()->textarea('alamat',$data->alamat)->class('form-control')->id('alamat') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('jabatan')->text('Jabatan') !!}
                {!! html()->text('jabatan',$data->jabatan)->placeholder('Type Jabatan here')->class('form-control')->id('jabatan') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('dari')->text('Dari') !!}
                {!! html()->text('dari',$data->dari)->placeholder('Type Dari here')->class('form-control')->id('dari') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('keperluan')->text('Keperluan') !!}
                {!! html()->textarea('keperluan',$data->keperluan)->class('form-control')->id('keperluan') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('unor_id')->text('Unor') !!}
                {!! html()->select('unor_id',$sub_unor)->placeholder('Choose Unor here')->class('form-control select2')->id('unor_id') !!}
            </div>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->closeModelForm() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-edit"></i> Edit Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Simpan Data');
</script>
