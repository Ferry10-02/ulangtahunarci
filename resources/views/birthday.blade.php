@extends('layouts.app')

@section('content')
<div class="site-shell" id="home">
  <nav class="nav" aria-label="Navigasi utama">
    <a class="brand" href="#home">For You <span>♥</span></a>
    <button class="menu-button" id="menu-button" aria-expanded="false" aria-controls="nav-links">☰</button>
    <div class="nav-links" id="nav-links">
      <a href="#home">Home</a><a href="#story">Story</a><a href="#memories">Memories</a>
      <a href="#gallery">Gallery</a><a href="#letter">Message</a><a href="#wish">Wish</a>
      <a href="#final" class="nav-cta">For You ♥</a>
    </div>
  </nav>

  <main>
    <section class="hero section" id="hero">
      <div class="glow glow-a"></div><div class="glow glow-b"></div><div class="sparkles" aria-hidden="true"></div>
      <div class="hero-copy">
        <p class="eyebrow">Today is Your Day ✨</p>
        <h1>Happy Birthday <em>{{ config('birthday.name') }} <span>♡</span></em></h1>
        <p class="intro">Hari ini adalah hari yang spesial karena ada seseorang yang lahir ke dunia dan membuat banyak hal menjadi lebih indah.</p>
        <button class="pink-button" id="open-gift">Mulai Kejutan <span>✦</span></button>
        <button class="mini-player" id="play-toggle" aria-label="Putar lagu Happy Birthday"><b id="music-icon">♫</b><span><small>Happy Birthday</small><i id="music-status">Klik untuk memutar</i></span><strong id="music-control">▶</strong></button>
      </div>
      <div class="gift-scene" aria-label="Kotak hadiah untukmu">
        <div class="balloon b1"></div><div class="balloon b2"></div><div class="balloon b3"></div>
        <div class="gift" id="gift-box"><div class="ribbon vertical"></div><div class="ribbon horizontal"></div><div class="lid"></div><div class="gift-label">For<br>You♡</div></div>
      </div>
      <a href="#memories" class="scroll-hint">⌄</a>
    </section>

    <section class="section memories split-section" id="memories">
      <div><p class="eyebrow">Our Memories ♥</p><h2>Kenangan Kita <span>✦</span></h2><p>Beberapa momen berharga yang selalu ingin aku ingat.</p><a class="outline-button" href="#gallery">Lihat Semua Kenangan ↗</a></div>
      <div class="polaroids" aria-label="Koleksi kenangan">
        @foreach(array_slice(config('birthday.memories'), 0, 4) as $i => $photo)
          <figure class="polaroid p{{ $i + 1 }}"><img class="photo" src="{{ asset($photo) }}" alt="Kenangan {{ $i + 1 }}"><figcaption>kenangan {{ $i + 1 }}</figcaption></figure>
        @endforeach
      </div>
    </section>

    <section class="section story" id="story">
      <p class="eyebrow">Our Story</p><h2>Perjalanan Kita</h2>
      <div class="timeline">
        <article><b>✧</b><h3>Pertama Kenal</h3><p>Awal pertemuan yang tidak aku bayangkan.</p><time>12 Jan 2022</time></article>
        <article class="active"><b>♥</b><h3>Momen Spesial</h3><p>Banyak momen indah yang tercipta untukmu.</p><time>14 May 2022</time></article>
        <article><b>▣</b><h3>Momen Favorit</h3><p>Kenangan yang selalu ingin diingat.</p><time>10 Aug 2023</time></article>
        <article><b>♔</b><h3>Hari Ini</h3><p>Hari spesial untukmu.</p><time>Today</time></article>
      </div>
    </section>

    <section class="section letter split-section" id="letter">
      <div><p class="eyebrow">A Letter For You</p><h2>Surat Mamicii <span>💌</span></h2><p>Ada banyak hal yang ingin aku sampaikan, bukan hanya hari ini, tapi setiap hari.</p><button class="pink-button" id="letter-button">Buka Surat ✉</button></div>
      <button class="envelope" id="envelope" aria-label="Buka surat"><span class="stamp">♥</span><span class="seal">♡</span></button>
    </section>

    <section class="section reasons" id="wish">
      <p class="eyebrow">You Are So Special</p><h2>Alasan Kamu Spesial <span>✦</span></h2>
      <div class="reason-grid">
        @foreach(['♡|Baik Hati|Kamu selalu punya hati yang tulus','★|Mengerti|Selalu ada dan mengerti aku','☺|Because You\'re My Bestie|Kamu tahu cara membuatku bahagia','♛|Istimewa|Kamu itu unik dan tak tergantikan','∞|Selamanya|Semoga kita bisa terus bersama'] as $reason)
          @php([$icon, $title, $text] = explode('|', $reason))
          <article><b>{{ $icon }}</b><h3>{{ $title }}</h3><p>{{ $text }}</p></article>
        @endforeach
      </div>
    </section>

    <section class="section gallery split-section" id="gallery">
      <div><p class="eyebrow">Gallery</p><h2>Our Story <span>📷</span></h2><p>Potongan kecil dari cerita yang indah.</p><button class="outline-button" id="gallery-next">Lihat Foto Lain →</button></div>
      <div class="gallery-row" id="gallery-row">
        @foreach(config('birthday.memories') as $i => $photo)
          <button class="gallery-card" style="background: center / cover no-repeat url('{{ asset($photo) }}')" aria-label="Kenangan {{ $i + 1 }}"></button>
        @endforeach
      </div>
    </section>

    <section class="section countdown-section">
      <div><p class="eyebrow">Countdown</p><h2>Menuju Hari Spesialmu 🎂</h2><div class="countdown"><article><b id="days">00</b><span>Hari</span></article><article><b id="hours">00</b><span>Jam</span></article><article><b id="minutes">00</b><span>Menit</span></article><article><b id="seconds">00</b><span>Detik</span></article></div></div>
      <div class="wish-copy"><p class="eyebrow">Birthday Wishes</p><h2>Harapan untukmu ✨</h2><p>Semoga di usia yang baru ini, kamu selalu diberi kesehatan, kebahagiaan, dan semua hal baik yang kamu impikan.</p><button class="outline-button" id="amen-button">Aamiin ✦</button></div>
      <div class="cake" aria-label="Kue ulang tahun dengan tiga lilin"><i class="candle candle-one"></i><i class="candle candle-two"></i><i class="candle candle-three"></i><b>Happy<br>Birthday</b></div>
    </section>

    <section class="section final" id="final"><div class="couple">♥</div><div><p>Terima kasih</p><h2>Telah hadir di hidupku</h2><p>Selamat ulang tahun sayang, semoga kamu selalu bahagia hari ini, besok, dan selamanya.</p><button class="pink-button" id="love-button">I Love You ♥</button></div></section>
  </main>
</div>
<dialog id="letter-dialog"><button class="close-dialog" aria-label="Tutup">×</button><p class="eyebrow">For {{ config('birthday.name') }}</p><h2>Untuk Kamu ♡</h2><p>{!! nl2br(e(config('birthday.message'))) !!}</p></dialog>
<div class="toast" id="toast" role="status"></div>
@endsection
