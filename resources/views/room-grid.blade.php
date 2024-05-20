@extends('layout.main')

@section('container')
    <div class="page-wrapper">
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-140 rpt-80 pb-240 rpb-150 rel z-1 bgs-cover bgc-black text-center"
            style="background-image: url(assets/images/background/image\ 4.png)">
            <div class="container">
                <div class="banner-inner text-white rpb-25">
                    <h1 class="page-title wow fadeInUp delay-0-2s">Our Room</h1>
                </div>
            </div>
            <div class="bg-lines">
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </section>
        <!-- Page Banner End -->

        <!-- Filter Form Start -->
        <div class="container">
            <form action="{{ route('room-grid') }}" method="GET" class="my-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch" class="mb-2"
                                style="font-family: 'Poppins', sans-serif; font-size: 16px;">Pilih
                                Cabang Hotel:</label>
                            <select name="branch" id="branch" class="form-control"
                                style="font-family: 'Poppins', sans-serif;">
                                <option value="">Semua Cabang</option>
                                @foreach ($cabanghotels as $cabanghotel)
                                    <option value="{{ $cabanghotel->id }}"
                                        {{ Request::get('branch') == $cabanghotel->id ? 'selected' : '' }}>
                                        {{ $cabanghotel->nama_cabang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-filter"
                            style="font-family: 'Poppins', sans-serif; font-size: 16px;">Filter</button>
                    </div>
                </div>
            </form>
        </div>


        <!-- Filter Form End -->

        <!-- Rooms Area start -->
        <section class="rooms-grid-area pb-125 rpb-95 rel z-2 mt-100">
            <div class="container">
                <div class="row">
                    @foreach ($kamars as $kamar)
                        <div class="col-xl-4 col-md-6">
                            <div class="room-item style-two wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img src="{{ $kamar->image }}" alt="Room">
                                    <a class="category"
                                        href="{{ route('room-details', ['id' => $kamar->id]) }}">{{ $kamar->tipe_kamar }}</a>
                                </div>
                                <div class="content">
                                    <h4><a href="{{ route('room-details', ['id' => $kamar->id]) }}">{{ $kamar->nama }}</a>
                                    </h4>
                                    @if ($kamar->gambar)
                                        <img src="{{ $kamar->gambar }}" alt="{{ $kamar->nama }}">
                                    @endif
                                    <ul class="blog-meta">
                                        <li>
                                            <i class="far fa-bed-alt"></i>
                                            <a href="#">Adults : {{ $kamar->person }}</a>
                                        </li>
                                    </ul>
                                    <p>{{ implode(' ', array_slice(str_word_count($kamar->deskripsi, 1), 0, 20)) }}</p>
                                    <div class="price"><span>Rp.
                                            {{ number_format($kamar->harga, 0, ',', '.') }}</span>/per night</div>
                                </div>
                                <a class="theme-btn" href="{{ route('room-details', ['id' => $kamar->id]) }}">Book Now
                                    <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Pagination Start -->
                    <ul class="pagination pt-10 flex-wrap justify-content-center wow fadeInUp delay-0-2s">
                        {{-- Previous Button --}}
                        <li class="page-item {{ $kamars->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $kamars->previousPageUrl() }}"><i
                                    class="far fa-arrow-left"></i></a>
                        </li>
                        {{-- Page Numbers --}}
                        @for ($i = 1; $i <= $kamars->lastPage(); $i++)
                            <li class="page-item {{ $kamars->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $kamars->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        {{-- Next Button --}}
                        <li class="page-item {{ $kamars->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $kamars->nextPageUrl() }}"><i class="far fa-arrow-right"></i></a>
                        </li>
                    </ul>
                    <!-- Pagination End -->
                </div>
            </div>
        </section>
        <!-- Rooms Area end -->



        <!-- Scroll Top Button -->
        <button class="scroll-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></button>
    </div>
    <!--End pagewrapper-->
@endsection
