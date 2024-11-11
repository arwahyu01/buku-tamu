{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body row">
        <div class="col-md-8">
            <div class="row">
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('nama')->text('Nama Lenkap') !!}
                    {!! html()->text('nama',null)->placeholder('Type Nama here')->class('form-control')->id('nama') !!}
                </div>
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('nik')->text('NIK') !!}
                    {!! html()->text('nik',null)->placeholder('Type Nik here')->class('form-control')->id('nik') !!}
                </div>
            </div>
            <div class="row">
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('tempat_lahir')->text('Tempat Lahir') !!}
                    {!! html()->text('tempat_lahir',null)->placeholder('Type Tempat Lahir here')->class('form-control')->id('tempat_lahir') !!}
                </div>
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('tanggal_lahir')->text('Tanggal Lahir') !!}
                    {!! html()->date('tanggal_lahir',null)->class('form-control')->id('tanggal_lahir') !!}
                </div>
            </div>
            <div class="row">
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('email')->text('Email') !!}
                    {!! html()->email('email',null)->class('form-control')->id('email') !!}
                </div>
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('no_hp')->text('No Hp') !!}
                    {!! html()->text('no_hp',null)->placeholder('Type No Hp here')->class('form-control')->id('no_hp') !!}
                </div>
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('alamat')->text('Alamat') !!}
                {!! html()->textarea('alamat',null)->class('form-control')->id('alamat') !!}
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('jabatan')->text('Jabatan') !!}
                {!! html()->text('jabatan',null)->placeholder('Type Jabatan here')->class('form-control')->id('jabatan') !!}
            </div>
            <div class="row">
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('dari')->text('Dari') !!}
                    {!! html()->text('dari',null)->placeholder('Type Dari here')->class('form-control')->id('dari') !!}
                </div>
                <div class='form-group col-md-6'>
                    {!! html()->label()->class('control-label')->for('unor_id')->text('Tujuan') !!}
                    {!! html()->select('unor_id',$sub_unor)->placeholder('Choose Unor here')->class('form-control select2')->id('unor_id') !!}
                </div>
            </div>
            <div class='form-group'>
                {!! html()->label()->class('control-label')->for('keperluan')->text('Keperluan') !!}
                {!! html()->textarea('keperluan',null)->class('form-control')->id('keperluan')->rows(3) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class='form-group'>
                <div class="box shadow-sm">
                    <div class="box-body text-center">
                        <video id="video" class="col-12" autoplay></video>
                        <button type="button" class="btn btn-sm btn-primary w-100" id="captureButton">Ambil Foto</button>
                    </div>
                </div>
            </div>
            <div class="form-group foto-content" style="display: none;">
                <div class="box shadow-sm">
                    <div class="box-body text-center">
                        <canvas id="canvas" class="col-12" height="200"></canvas>
                        {!! html()->hidden('capturedImage')->class('form-control')->id('capturedImage') !!}
                        <button type="button" class="btn btn-sm btn-danger w-100" id="deleteFoto">Hapus Foto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->form()->close() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1200px !important;
    }
</style>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Tambah Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Simpan Data');
</script>
<script>
    // Cek apakah getUserMedia tersedia
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        var videoElement = document.getElementById('video');
        var captureButton = document.getElementById('captureButton');
        var deleteFoto = document.getElementById('deleteFoto');
        var canvas = document.getElementById('canvas');
        var mediaStream = null;

        function startCamera() {
            navigator.mediaDevices.getUserMedia({video: true})
                .then(stream => {
                    mediaStream = stream;
                    videoElement.srcObject = stream;
                    captureButton.disabled = false;
                })
                .catch(err => {
                    swal("Gagal mengakses kamera", "Pastikan kamera Anda tersedia dan diizinkan untuk digunakan.", "error");
                    captureButton.disabled = true;
                });
        }

        // Fungsi untuk mengambil foto dari video stream
        function captureImage() {
            let context = canvas.getContext('2d');
            context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
            capturedImage.value = canvas.toDataURL('image/png');
            $('.foto-content').show();
        }

        captureButton.addEventListener('click', captureImage);
        deleteFoto.addEventListener('click', function () {
            capturedImage.value = '';
            $('.foto-content').hide();
        });
        startCamera();
    } else {
        alert("Browser Anda tidak mendukung akses kamera.");
    }
</script>
