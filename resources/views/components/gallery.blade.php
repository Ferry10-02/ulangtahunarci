<section id="gallery" class="py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-semibold">Foto Kenangan 📷</h2>
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @foreach(config('birthday.memories') as $i => $photo)
        <div class="gallery-item overflow-hidden rounded">
          <img src="{{ asset($photo) }}" alt="gallery-{{ $i }}" loading="lazy" class="w-full h-56 object-cover transform hover:scale-105 transition">
        </div>
      @endforeach
    </div>
  </div>
</section>
