<section id="memories" class="py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-semibold">Our Memories 📸</h2>
    <p class="text-gray-300 mt-2">Kenangan yang selalu ingin aku ingat.</p>
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach(config('birthday.memories') as $i => $photo)
        <div class="polaroid" data-index="{{ $i }}">
          <img src="{{ asset($photo) }}" alt="memory-{{ $i }}" loading="lazy" class="w-full h-64 object-cover rounded shadow-lg">
          <div class="mt-2 text-sm text-gray-200">Caption placeholder</div>
        </div>
      @endforeach
    </div>
  </div>
</section>
