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
                        <h3>Reservasi Kamar</h3>
                        <form id="reservasiForm">
                            @csrf
                            <input type="hidden" name="branch" value="{{ $cabanghotel->nama_cabang }}">
                            <input type="hidden" name="nama_kamar" value="{{ $kamar->tipe_kamar }}">
                            <input type="hidden" id="isAuthenticated" value="{{ Auth::check() }}">
                            <div class="form-group">
                                <label for="nama_pemesan">Nama Pemesan:</label>
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                            </div>
                            <div class="form-group">
                                <label for="checkin">Tanggal Check-in:</label>
                                <input type="date" class="form-control" id="checkin" name="checkin" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout">Tanggal Check-out:</label>
                                <input type="date" class="form-control" id="checkout" name="checkout" required>
                            </div>
                            <input type="hidden" name="harga_kamar" value="{{ $kamar->harga }}">
                            <!-- Isi formulir reservasi -->
                            <button type="button" class="btn btn-primary" onclick="submitReservasi()">Reservasi via
                                WhatsApp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-lines for-bg-white">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <script>
        function submitReservasi() {
        var isAuthenticated = document.getElementById('isAuthenticated').value;
        if (isAuthenticated == 0) { // Jika user belum login
            window.location.href = "/login"; // Redirect ke halaman login
            return;
        }

        var branch = document.getElementsByName('branch')[0].value;
        var namaKamar = document.getElementsByName('nama_kamar')[0].value;
        var namaPemesan = document.getElementById('nama_pemesan').value;
        var checkin = document.getElementById('checkin').value;
        var checkout = document.getElementById('checkout').value;
        var hargaKamar = document.getElementsByName('harga_kamar')[0].value;

        // Pastikan semua field terisi
        if (!branch || !namaKamar || !namaPemesan || !checkin || !checkout || !hargaKamar) {
            alert("Harap mengisi semua field sebelum melanjutkan.");
            return;
        }

        // Format harga untuk WhatsApp
        var formattedHargaKamar = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(hargaKamar);

        // Buat pesan WhatsApp dengan format yang lebih rapi dan formal
        var pesanWhatsApp = "Reservasi Kamar\n\n" +
            "Cabang: " + branch + "\n" +
            "Tipe Kamar: " + namaKamar + "\n" +
            "Nama Pemesan: " + namaPemesan + "\n" +
            "Tanggal Check-in: " + checkin + "\n" +
            "Tanggal Check-out: " + checkout + "\n" +
            "Total Harga: " + formattedHargaKamar + "\n\n" +
            "Terima kasih.";

        // Encode pesan untuk URL
        var encodedMessage = encodeURIComponent(pesanWhatsApp);

        // Redirect ke WhatsApp dengan pesan yang telah dibuat
        window.location.href = "https://wa.me/6281585290160?text=" + encodedMessage;
    }


    </script>

@endsection
