@extends('layouts.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh; position: relative;">
    <div id="header-carousel" class="carousel slide" data-ride="carousel" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        <div class="carousel-inner" style="height: 100%;">
            @foreach ($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="height: 100%;">
                <img class="d-block w-100 h-100" src="{{ asset('storage/' . $slider->image) }}" alt="Slide {{ $index + 1 }}" style="object-fit: cover;">
                <div class="carousel-caption d-flex justify-content-center align-items-center h-100 text-center">
                    <div class="carousel-text" style="max-width: 1200px; background: rgba(0, 0, 0, 0.5); padding: 50px; border-radius: 30px;">
                        <h3 class="text-white font-weight-light mb-3">{{ $slider->title }}</h3>
                        <h1 class="display-3 text-uppercase text-primary mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">{{ $slider->subtitle }}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#header-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#header-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- Header End -->


<!-- Videos Start -->
<div class="container-fluid py-5" id="videos">
    <div class="container">
        <div class="card mb-5">
            <div class="card-body">
                <div class="position-relative d-flex align-items-center justify-content-center mb-4">
                    
                </div>
                <div class="row">
                    @foreach($videos as $video)
                    <div class="col-lg-12 col-md-14 mb-4">
                        <div class="card mb-2" style="border-radius: 20px; overflow: hidden; width: 100%; height: 500px;">
                            <div class="embed-responsive embed-responsive-16by9" style="border-radius: 20px;">
                                @if(strpos($video->video_link, 'drive.google.com') !== false)
                                    @php
                                        $videoId = explode('/', parse_url($video->video_link, PHP_URL_PATH))[3];
                                        $embedUrl = "https://drive.google.com/file/d/{$videoId}/preview";
                                    @endphp
                                    <iframe class="embed-responsive-item w-100" src="{{ $embedUrl }}" allowfullscreen></iframe>
                                @else
                                    <iframe class="embed-responsive-item w-100" src="{{ $video->video_link }}" allowfullscreen></iframe>
                                @endif
                            </div>
                            <div class="card-body text-center" style="border-radius: 20px;">
                                <h5 class="card-title">{{ $video->title }}</h5>
                            </div>
                        </div>
                    </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Videos End -->





<div class="container-fluid py-5" id="portfolios">
    <div class="container">
        <div class="card mb-5">
            <div class="card-body">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                </div>
                <br>
                <div class="row">
                    @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card mb-2">
                            <img src="{{ asset('storage/' . $portfolio->image) }}" class="card-img-top" alt="{{ $portfolio->title }}">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{ $portfolio->title }}</h5>
                                <p class="card-text">{{ $portfolio->category }}</p>
                                <a href="{{ $portfolio->link }}" class="btn btn-primary" target="_blank">View More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolios End -->



<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container">
        <div class="card mb-5">
            <div class="card-body">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Profile PPID </h1>
                </div>
                <div class="row">
                    @forelse ($aboutme as $about)
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <p class="card-text text-justify">{{ $about->content }}</p>
                                @if(isset($about->image) && $about->image)
                                    <img src="{{ asset('storage/aboutme/' . $about->image) }}" class="img-fluid mt-3" alt="About Me Image">
                                @endif
                                @if($about->link)
                                    <a href="{{ $about->link }}" class="btn btn-primary mt-2" title="{{ $about->content }}">View Link</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>No profiles found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Portfolio Slides -->
<div class="container">
            <div class="card mb-5">
            <div class="card-body">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Fasilitas Umum dan Media Publik</h1>
            </div>
            <br>
    <div class="row">
        @foreach($slides as $slide)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div id="carousel-{{ $slide->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($slide->images as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/portfolio_slides/' . $image) }}" class="d-block w-100" alt="{{ $slide->title }}">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-{{ $slide->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-{{ $slide->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $slide->title }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    

<!-- Portfolio Slides End -->


<!-- Sources Start -->
<div class="container-fluid py-5 bg-light" id="sources">
    <div class="container">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Sumber Informasi</h1>
            </div>
            <br>
        <div class="row">
            @foreach ($sources as $source)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg rounded">
                    @if($source->image)
                        <img src="{{ asset('storage/sources/' . $source->image) }}" class="card-img-top img-fluid rounded-top" alt="Source Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title mb-3 text-primary">{{ $source->title }}</h5>
                        <p class="card-text text-muted">{!! $source->content !!}</p>
                        <a href="{{ $source->link }}" target="_blank" class="btn btn-primary mt-3">View Source</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Sources End -->



<!-- Guestbook Start -->
<div class="container-fluid py-5" id="Guestbook">
    <div class="container">
        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Buku Tamu</h1>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0">Formulir Buku Tamu</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.guestbook.store') }}">
                                    @csrf
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                    </div>
                                    
                                    <!-- Nomor Telepon -->
                                    <div class="form-group">
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                                    </div>
                                    
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    
                                    <!-- Nama Perusahaan -->
                                    <div class="form-group">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                                    </div>
                                    
                                    <!-- Alamat Perusahaan -->
                                    <div class="form-group">
                                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                        <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" required>
                                    </div>
                                    
                                    <!-- Personal/Bidang -->
                                    <div class="form-group">
                                        <label for="personal_bidang">Personal/Bidang</label>
                                        <input type="text" class="form-control" id="personal_bidang" name="personal_bidang" required>
                                    </div>
                                    
                                    <!-- Tujuan -->
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-lg mt-3">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Guestbook End -->



<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Permohonan Informasi</h1>
            </div>
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Formulir Permohonan Informasi</h4>

                <form id="informationRequestForm" method="POST" action="{{ route('admin.permohonan_informasi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <!-- Nama -->
                        <div class="form-group col-md-6">
                            <label for="nama">Nama (Sesuai KTP):</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required />
                            @error('nama')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
                            @error('email')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- No KTP -->
                        <div class="form-group col-md-6">
                            <label for="no_ktp">No KTP / NIK:</label>
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}" required />
                            @error('no_ktp')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No HP -->
                        <div class="form-group col-md-6">
                            <label for="no_hp">No HP / Kontak:</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required />
                            @error('no_hp')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Alamat -->
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required />
                            @error('alamat')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Informasi -->
                        <div class="form-group col-md-6">
                            <label for="nama_informasi">Nama Informasi yang Dibutuhkan:</label>
                            <input type="text" class="form-control" id="nama_informasi" name="nama_informasi" value="{{ old('nama_informasi') }}" required />
                            @error('nama_informasi')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Tujuan -->
                        <div class="form-group col-md-6">
                            <label for="tujuan">Tujuan:</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ old('tujuan') }}" required />
                            @error('tujuan')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Upload KTP -->
                        <div class="form-group col-md-6">
                            <label for="upload_ktp">Upload KTP:</label>
                            <input type="file" class="form-control-file" id="upload_ktp" name="upload_ktp" />
                            @error('upload_ktp')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Cara Mendapatkan Informasi -->
                        <div class="form-group col-md-6">
                            <label for="cara_mendapatkan">Cara Mendapatkan Informasi:</label>
                            <select class="form-control" id="cara_mendapatkan" name="cara_mendapatkan" required>
                                <option value="lihat/baca/dengar/catat" {{ old('cara_mendapatkan') == 'lihat/baca/dengar/catat' ? 'selected' : '' }}>Lihat/Baca/Dengar/Catat</option>
                                <option value="mendapatkan salinan informasi" {{ old('cara_mendapatkan') == 'mendapatkan salinan informasi' ? 'selected' : '' }}>Mendapatkan Salinan Informasi</option>
                            </select>
                            @error('cara_mendapatkan')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cara Memberikan Informasi -->
                        <div class="form-group col-md-6">
                            <label for="cara_memberikan">Cara Memberikan Informasi:</label>
                            <select class="form-control" id="cara_memberikan" name="cara_memberikan" required>
                                <option value="mengambil langsung" {{ old('cara_memberikan') == 'mengambil langsung' ? 'selected' : '' }}>Mengambil Langsung</option>
                                <option value="email" {{ old('cara_memberikan') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="faksimili" {{ old('cara_memberikan') == 'faksimili' ? 'selected' : '' }}>Faksimili</option>
                                <option value="dikirim" {{ old('cara_memberikan') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                            </select>
                            @error('cara_memberikan')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg mt-3">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Permohonan Informasi End -->




                               
<!-- Complaint Start -->
<div class="container-fluid py-5" id="complaint">
    <div class="container">
        <div class="card mb-5">
            <div class="card-body">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="display-4 text-uppercase" style="-webkit-text-stroke: 1px #dee2e6;">Pengaduan</h1>
                </div>
                <br>
                <div class="row">
                    @forelse ($complaints as $complaint)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card mb-2">
                        <img src="{{ asset('storage/' . $complaint->image) }}" alt="{{ $complaint->title }}" width="500 px" position="center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $complaint->title }}</h5>
                                <p class="card-text">{{ $complaint->content }}</p>
                                @if($complaint->link)
                                    <a href="{{ $complaint->link }}" class="btn btn-primary mt-2" target="_blank">View More</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-center">Tidak ada pengaduan yang tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Complaint End -->

               
                 

<!-- Footer Start -->
<footer class="container-fluid bg-primary py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <h3 class="text-white">Address:</h3>
                <p class="text-white">Komplek SPOrT Jabar Arcmanik, Jl. Pacuan Kuda No. 140 Sukamiskin Bandung 40293</p>
                <h3 class="text-white">Tel / Fax:</h3>
                <p class="text-white">(022) 87884268 | (022) 87881419</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <h3 class="text-white">Website:</h3>
                <p class="text-white">dispora.jabarprov.go.id</p>
                <h3 class="text-white">Email:</h3>
                <p class="text-white">dispora@jabarprov.go.id</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 class="text-white">Social Media:</h3>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-tiktok"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- Google Maps Embed -->
        <div class="row mt-4">
            <div class="col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4849600365217!2d107.61774801431446!3d-6.916753869176887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68efb5ed97d00f%3A0xb2934c6b5e67262c!2sKomplek%20SPOrT%20Jabar%20Arcamanik%2C%20Jl.%20Pacuan%20Kuda%20No.%20140%2C%20Sukamiskin%2C%20Bandung%2C%2040293%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1626861495875!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!-- End Google Maps Embed -->
    </div>
    
</footer>
<!-- Footer End -->
<div class="container-fluid bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p class="text-white">&copy; 2024 Dispora Jawa Barat. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 text-right">
                <a href="#" class="text-white">Terms & Conditions</a>
                <a href="#" class="text-white">Privacy Policy</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
 

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>
                  
    

    
    
@endsection
