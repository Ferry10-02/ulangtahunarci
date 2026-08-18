<nav x-data="{open:false}" class="fixed w-full z-50 top-4 px-6">
  <div class="max-w-6xl mx-auto flex items-center justify-between">
    <a href="#" class="text-2xl font-bold">For You ❤️</a>
    <div class="hidden md:flex space-x-6 items-center text-sm">
      <a href="#hero" class="nav-link">Home</a>
      <a href="#story" class="nav-link">Story</a>
      <a href="#memories" class="nav-link">Memories</a>
      <a href="#gallery" class="nav-link">Gallery</a>
      <a href="#letter" class="nav-link">Message</a>
      <a href="#wish" class="nav-link">Wish</a>
    </div>
    <button @click="open = !open" class="md:hidden p-2">☰</button>
  </div>
  <div x-show="open" class="md:hidden mt-4 bg-black/50 p-4 rounded">
    <a href="#hero" class="block py-2">Home</a>
    <a href="#story" class="block py-2">Story</a>
    <a href="#memories" class="block py-2">Memories</a>
  </div>
</nav>
