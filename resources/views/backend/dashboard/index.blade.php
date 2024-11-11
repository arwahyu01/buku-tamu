@extends('backend.main.index')
@push('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row align-items-end">
                    <div class="col-12">
                        <div class="box bg-primary-light overflow-hidden pull-up">
                            <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-8">
                                        <h2>Selamat Datang di Diskominfotik Kab. Indaragiri Hulu</h2>
                                        <p class="text-dark mb-0 fs-20">
                                            Silakan isi form buku tamu untuk memulai kunjungan Anda.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <img src="{{ url($template."/images/svg-icon/color-svg/custom-15.svg") }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('backend.main.menu.announcement')
                    <h3>Total Tamu</h3>
                    <div class="col-md-3">
                        <div class="box bg-primary-light overflow-hidden pull-up text-center">
                            <h1 class="fs-20">Hari Ini</h1>
                            <p class="text-dark fs-40 hari-ini">20</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box bg-primary-light overflow-hidden pull-up text-center">
                            <h1 class="fs-20">Bulan Ini</h1>
                            <p class="text-dark fs-40 bulan-ini">20</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box bg-primary-light overflow-hidden pull-up text-center">
                            <h1 class="fs-20">Tahun Ini</h1>
                            <p class="text-dark fs-40 tahun-ini">20</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box bg-primary-light overflow-hidden pull-up text-center">
                            <h1 class="fs-20">Total</h1>
                            <p class="text-dark fs-40 total-tamu">20</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 align-center text-center">
                    <a href="{{ url(config('master.app.url.backend').'/tamu') }}" class="text-center btn btn-sm btn-primary">
                        <span class="fa fa-plus-circle"></span>
                        Isi Buku Tamu
                    </a>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')
<script>
    $.ajax({
        url: "{{ url(config('master.app.url.backend').'/tamu/total-tamu') }}",
        method: 'GET',
        success: function (res) {
            if(res.status === 'success') {
                $('.hari-ini').html(res.data.tamu.hari_ini);
                $('.bulan-ini').html(res.data.tamu.bulan_ini);
                $('.tahun-ini').html(res.data.tamu.tahun_ini);
                $('.total-tamu').html(res.data.tamu.total);
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
</script>
@endpush
