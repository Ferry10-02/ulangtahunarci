<section id="story" class="py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-semibold">Our Story</h2>
    <p class="text-gray-300 mt-2">Perjalanan Kita ❤️</p>
    <div class="mt-8 flow-root">
      <div class="timeline relative">
        @foreach(config('birthday.timeline') as $i => $item)
          <div class="timeline-item p-6 md:flex md:items-center md:justify-between">
            <div class="md:w-1/4 text-pink-200 font-semibold">0{{ $i+1 }} — {{ $item['title'] }}</div>
            <div class="md:w-3/4 text-gray-300">{{ $item['text'] }} <span class="text-sm text-gray-400">({{ $item['date'] }})</span></div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
