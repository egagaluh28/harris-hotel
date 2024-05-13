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

        <!-- Rooms Area start -->
        <section class="rooms-grid-area pb-125 rpb-95 rel z-2 mt-100">
            <div class="container">
                <div class="row">
                    @php
                        // Bagi data kamar menjadi potongan-potongan dengan 6 item per potongan
                        $chunks = array_chunk($kamars->all(), 6);
                        
                        // Tentukan indeks potongan data saat ini
                        $currentChunkIndex = request()->get('page', 1) - 1;
                        
                        // Ambil potongan yang sesuai dengan indeks potongan saat ini
                        $currentPage = $chunks[$currentChunkIndex];
                    @endphp
                    @foreach ($currentPage as $kamar)
                        <div class="col-xl-4 col-md-6">
                            <div class="room-item style-two wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img src="{{ $kamar->image }}" alt="Room">
                                    <!-- Gunakan URL gambar dari model $kamar -->
                                    <a class="category"
                                        href="{{ route('room-details', ['id' => $kamar->id]) }}">{{ $kamar->tipe_kamar }}</a>
                                    <!-- Gunakan tipe_kamar atau informasi lainnya -->
                                </div>
                                <div class="content">
                                    <h4><a href="{{ route('room-details', ['id' => $kamar->id]) }}">{{ $kamar->nama }}</a>
                                    </h4>
                                    @if ($kamar->gambar)
                                        <!-- Pastikan ada gambar yang tersedia -->
                                        <img src="{{ $kamar->gambar }}" alt="{{ $kamar->nama }}">
                                    @else
                                        {{-- <p>Tidak ada gambar untuk kamar ini.</p> --}}
                                    @endif
                                    <ul class="blog-meta">
                                        <li>
                                            <i class="far fa-bed-alt"></i>
                                            <a href="#">Adults : {{ $kamar->person }}</a>
                                            <!-- Gunakan jumlah orang atau informasi lainnya -->
                                        </li>
                                    </ul>
                                    <p>{{ implode(' ', array_slice(str_word_count($kamar->deskripsi, 1), 0, 20)) }}</p>
                                    <!-- Gunakan deskripsi kamar atau informasi lainnya -->
                                    <div class="price">Price <span>Rp.
                                            {{ number_format($kamar->harga, 0, ',', '.') }}</span>/per night</div>
        
                                    <!-- Gunakan harga kamar -->
                                </div>
                                <a class="theme-btn" href="{{ route('room-details', ['id' => $kamar->id]) }}">Book Now
                                    <i class="fal fa-angle-right"></i></a>
        
                            </div>
                        </div>
                    @endforeach
                </div>
                <ul class="pagination pt-10 flex-wrap justify-content-center wow fadeInUp delay-0-2s">
                    {{-- Previous Button --}}
                    <li class="page-item {{ $currentChunkIndex == 0 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $currentChunkIndex != 0 ? '?page='.($currentChunkIndex) : '#' }}"><i class="far fa-arrow-left"></i></a>
                    </li>
                    {{-- Page Numbers --}}
                    @for ($i = 0; $i < count($chunks); $i++)
                        <li class="page-item {{ $i == $currentChunkIndex ? 'active' : '' }}">
                            <a class="page-link" href="?page={{ $i+1 }}">{{ $i+1 }}</a>
                        </li>
                    @endfor
                    {{-- Next Button --}}
                    <li class="page-item {{ $currentChunkIndex == count($chunks)-1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $currentChunkIndex != count($chunks)-1 ? '?page='.($currentChunkIndex+2) : '#' }}"><i class="far fa-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
            <div class="bg-lines for-bg-white">
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </section>
        
        <!-- Rooms Area end -->

        <!-- footer area start -->

        <!-- footer area end -->


        <!-- Scroll Top Button -->
        <button class="scroll-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></button>

    </div>
    <!--End pagewrapper-->
@endsection
