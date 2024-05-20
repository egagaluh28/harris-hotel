@extends('layout.main')
@section('container')
    <!-- Page Banner Start -->
    <section class="page-banner-area pt-195 rpt-135 pb-190 rpb-125 rel z-1 bgs-cover bgc-black text-center"
        style="background-image: url(https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bogor/harris-hotel-convention-cibinong-city-mall-bogor/apartmenttypes/typeofroom/harris-unique/HCCB-room-unique-gallery-004.jpg)">
        <div class="container">
            <div class="banner-inner text-white rpb-25">
                <h1 class="page-title wow fadeInUp delay-0-2s">Modern Luxury Room</h1>
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


    <!-- Room Details Area start -->
    <section class="room-details-area py-130 rpy-100 rel z-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="room-details-content rmb-55">
                        <div class="section-title wow fadeInUp delay-0-2s">
                            <h2 class="price fs-1">{{ $kamar->tipe_kamar }}</h2> <!-- Menampilkan nama kamar -->
                        </div>
                        <ul class="blog-meta wow fadeInUp delay-0-3s">
                            <li>
                                <i class="far fa-drafting-compass"></i>
                                <a href="#">Size : {{ $kamar->size }}</a> <!-- Menampilkan ukuran kamar -->
                            </li>
                            <li>
                                <i class="far fa-bed-alt"></i>
                                <a href="#">Beds : {{ $kamar->beds }}</a>
                                <!-- Menampilkan jumlah tempat tidur -->
                            </li>
                            <li>
                                <i class="far fa-bath"></i>
                                <a href="#">Bathrooms : {{ $kamar->bathrooms }}</a>
                                <!-- Menampilkan jumlah kamar mandi -->
                            </li>
                            <!-- Menampilkan rating jika tersedia -->
                            @if ($kamar->rating)
                                <li>
                                    <div class="ratting">
                                        @for ($i = 0; $i < $kamar->rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="price mb-35">Rp. {{ number_format($kamar->harga, 0, ',', '.') }} Per Night</div>

                        <!-- Menampilkan harga per malam -->
                        <p>{{ $kamar->deskripsi }}</p> <!-- Menampilkan deskripsi kamar -->
                        <!-- Menampilkan gambar-gambar kamar -->
                        <div class="room-details-images mt-45 wow fadeInUp delay-0-2s">
                            @if ($kamar->image)
                                <!-- Pastikan ada gambar yang tersedia -->
                                <img src="{{ $kamar->image }}" alt="{{ $kamar->nama }}">
                            @else
                                <p>Tidak ada gambar untuk kamar ini.</p>
                            @endif
                        </div>


                        <div class="section-title mt-35">
                            <h2>Room Facilities</h2>
                        </div>
                        <ul class="list-style-two three-column pt-10 wow fadeInUp delay-0-2s">
                            <li>Breakfast Included</li>
                            <li>Flat Screen TV</li>
                            <li>Hairdryer</li>
                            <li>Writing Desk</li>
                            <li>Towel Warmer</li>
                            <li>Shower bathtub</li>
                            <li>Balcony or Terrace</li>
                            <li>Ironing Board</li>
                            <li>Kettle Tea</li>
                            <li>Telephone</li>
                            <li>Saving Safe</li>
                            <li>Transportations</li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="room-details-sidebar bgc-lighter p-50 rp-40">
                        {{-- <form action="{{ route('pesan-kamar') }}" method="POST"
                            class="widget-search-filter wow fadeInUp delay-0-4s">
                            @csrf
                            <div class="form-group">
                                <label for="checkin">Check In</label>
                                <input type="date" id="checkin" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout">Check Out</label>
                                <input type="date" id="checkout" required>
                            </div>
                            <div class="form-group">
                                <label for="adults">Adults</label>
                                <select name="adults" id="adults">
                                    <option value="adults1">1</option>
                                    <option value="adults2">2</option>
                                    <option value="adults3" selected>3</option>
                                    <option value="adults3">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <button class="theme-btn w-100">Booking <i class="far fa-angle-right"></i></button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div id="map"></div>
        </div>
        <div class="bg-lines for-bg-white">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    
@endsection
