<div id="music-player" class="fixed right-6 bottom-6 z-50 p-3 rounded-xl bg-black/40 backdrop-blur-md border border-rose-600 shadow-lg flex items-center space-x-3">
  <button id="play-toggle" class="p-2 bg-transparent rounded-full border border-gray-600">▶</button>
  <div class="text-left">
    <div class="text-sm">♫ Our Special Song</div>
    <div id="progress" class="w-40 h-1 bg-gray-700 rounded mt-1 overflow-hidden">
      <div id="progress-bar" class="h-full bg-pink-400 w-0"></div>
    </div>
  </div>
  <audio id="bg-music" src="{{ asset(config('birthday.music')) }}" preload="auto"></audio>
</div>
