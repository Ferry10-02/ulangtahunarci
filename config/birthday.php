<?php

// Laravel registers this helper before loading configuration files. Keeping a
// fallback here lets this starter be inspected outside a complete Laravel app
// (and lets static analysers resolve the function) without overriding Laravel.
if (! function_exists('env')) {
    /**
     * @param mixed $default
     * @return mixed
     */
    function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? getenv($key);

        return $value === false ? $default : $value;
    }
}

return [
    'name' => env('BIRTHDAY_NAME', 'Arsi Aisah'),
    'birthday' => env('BIRTHDAY_DATE', '2026-08-19 00:00:00'),
    'music' => env('BIRTHDAY_MUSIC', '/storage/music/our-song.mp3'),
    'message' => env('BIRTHDAY_MESSAGE', "Happy birthday, Mamicii! 🥳🎉 Semoga panjang umur, sehat selalu, dimudahkan segala urusannya, dan selalu dikelilingi kebahagiaan. Jujur, aku gak nyangka bisa kenal, jadi temen, bahkan sedeket ini sama mami. Meskipun kadang galak, bawel, dan suka bikin deg-degan karena aku selalu nguji kesabaran mamii, tapi di balik itu semua aku bener-bener salut sama back story mamii. Buat aku, u itu wanita yang kuat, hebat, dan keren banget. Selalu jadi teman yang selalu menginspirasi yang lainnya yaa. Semoga semua cita-cita dan impian mami satu per satu tercapai. Dan yang paling penting... jangan sombong, jangan asing, tetap jadi Mamicii yang aku kenal yaa. 😉 Semoga pertemanan kita awet terus. And once again happy birthday mamiiii😙😙"),
    'memories' => [
        // Tambahkan atau ganti foto di public/storage/memories.
        '/storage/memories/1.jpeg',
        '/storage/memories/2.jpeg',
        '/storage/memories/3.jpeg',
        '/storage/memories/4.jpeg',
        '/storage/memories/5.jpeg',
        '/storage/memories/6.jpeg',
    ],    'timeline' => [
        ['title' => 'Pertama Kenal', 'date' => '2018', 'text' => 'Awal dari sebuah cerita yang tidak pernah aku bayangkan.'],
        ['title' => 'Mulai Dekat', 'date' => '2019', 'text' => 'Pelan-pelan, kamu menjadi seseorang yang spesial.'],
        ['title' => 'Momen Favorit', 'date' => '2021', 'text' => 'Beberapa momen sederhana justru menjadi kenangan paling berharga.'],
        ['title' => 'Hari Ini', 'date' => date('Y'), 'text' => 'Hari spesial untuk seseorang yang spesial.'],
    ],
    'wishes' => [
        'Semoga selalu sehat.',
        'Semoga semua impianmu perlahan menjadi nyata.',
        'Semoga langkahmu selalu dipertemukan dengan hal-hal baik.',
        'Semoga kamu selalu dikelilingi orang-orang yang tulus.',
        'Semoga tahun ini menjadi salah satu tahun terbaik dalam hidupmu.',
    ],
];
