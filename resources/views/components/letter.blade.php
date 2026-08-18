<section id="letter" class="py-20">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-semibold">A Letter For You 💌</h2>
    <p class="text-gray-300 mt-2">Ada banyak hal yang ingin aku sampaikan.</p>
    <div class="mt-8 flex justify-center">
      <div id="envelope" class="w-80 h-52 bg-gradient-to-b from-black/40 to-black/25 rounded-lg shadow-lg flex items-center justify-center cursor-pointer">
        <div class="text-white">Klik untuk membuka amplop</div>
      </div>
    </div>
    <div id="letter-content" class="mt-6 max-w-prose mx-auto text-left text-gray-100 hidden">
      <div class="handwriting text-lg leading-relaxed">{!! nl2br(e(config('birthday.message'))) !!}</div>
    </div>
  </div>
</section>
