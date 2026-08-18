const $ = (selector) => document.querySelector(selector);
const toast = (message) => { const el = $('#toast'); el.textContent = message; el.classList.add('show'); setTimeout(() => el.classList.remove('show'), 2600); };

const menuButton = $('#menu-button');
menuButton?.addEventListener('click', () => { const links = $('#nav-links'); const open = links.classList.toggle('open'); menuButton.setAttribute('aria-expanded', String(open)); });
document.querySelectorAll('.nav-links a').forEach((link) => link.addEventListener('click', () => $('#nav-links').classList.remove('open')));

$('#open-gift')?.addEventListener('click', () => { $('#gift-box').classList.toggle('open'); document.querySelector('#memories').scrollIntoView({ behavior: 'smooth' }); toast('Kejutan dimulai — selamat menjelajah! ✨'); });

// Melodi Happy Birthday dibuat dengan Web Audio, jadi tidak memerlukan file MP3 eksternal.
const birthdayTune = [
  ['G4', .75], ['G4', .25], ['A4', 1], ['G4', 1], ['C5', 1], ['B4', 2],
  ['G4', .75], ['G4', .25], ['A4', 1], ['G4', 1], ['D5', 1], ['C5', 2],
  ['G4', .75], ['G4', .25], ['G5', 1], ['E5', 1], ['C5', 1], ['B4', 1], ['A4', 2],
  ['F5', .75], ['F5', .25], ['E5', 1], ['C5', 1], ['D5', 1], ['C5', 2],
];
const noteFrequency = { C4: 261.63, D4: 293.66, E4: 329.63, F4: 349.23, G4: 392, A4: 440, B4: 493.88, C5: 523.25, D5: 587.33, E5: 659.25, F5: 698.46, G5: 783.99 };
let musicContext, musicTimer, musicPlaying = false;
const setMusicState = (playing) => {
  musicPlaying = playing;
  $('#music-status').textContent = playing ? 'Sedang diputar' : 'Klik untuk memutar';
  $('#music-control').textContent = playing ? '❚❚' : '▶';
};
const stopBirthdayTune = () => {
  clearTimeout(musicTimer);
  musicContext?.close();
  musicContext = null;
  setMusicState(false);
};
const playBirthdayTune = () => {
  if (musicPlaying) return stopBirthdayTune();
  const AudioContext = window.AudioContext || window.webkitAudioContext;
  if (!AudioContext) return toast('Browser ini belum mendukung pemutar musik.');
  musicContext = new AudioContext();
  const beat = .38;
  let at = musicContext.currentTime + .06;
  birthdayTune.forEach(([note, beats]) => {
    const oscillator = musicContext.createOscillator();
    const volume = musicContext.createGain();
    const length = beats * beat;
    oscillator.type = 'triangle';
    oscillator.frequency.value = noteFrequency[note];
    volume.gain.setValueAtTime(.0001, at);
    volume.gain.exponentialRampToValueAtTime(.16, at + .025);
    volume.gain.exponentialRampToValueAtTime(.0001, at + length * .9);
    oscillator.connect(volume).connect(musicContext.destination);
    oscillator.start(at);
    oscillator.stop(at + length);
    at += length;
  });
  setMusicState(true);
  musicTimer = setTimeout(stopBirthdayTune, Math.ceil((at - musicContext.currentTime) * 1000) + 120);
};
$('#play-toggle')?.addEventListener('click', playBirthdayTune);

const dialog = $('#letter-dialog');
$('#letter-button')?.addEventListener('click', () => dialog.showModal());
$('#envelope')?.addEventListener('click', () => dialog.showModal());
$('.close-dialog')?.addEventListener('click', () => dialog.close());
dialog?.addEventListener('click', (event) => { if (event.target === dialog) dialog.close(); });

const target = new Date(document.documentElement.dataset.birthday || '2026-12-31T00:00:00').getTime();
const tick = () => { let remaining = Math.max(0, target - Date.now()); const units = [[86400000, 'days'], [3600000, 'hours'], [60000, 'minutes'], [1000, 'seconds']]; units.forEach(([unit, id]) => { const value = Math.floor(remaining / unit); remaining %= unit; const el = $('#' + id); if (el) el.textContent = String(value).padStart(2, '0'); }); };
tick(); setInterval(tick, 1000);
$('#amen-button')?.addEventListener('click', () => toast('Aamiin. Semoga semua harapan baik menjadi nyata. ♥'));
$('#love-button')?.addEventListener('click', () => toast('I love you too! ♡'));
$('#gallery-next')?.addEventListener('click', () => { $('#gallery-row').scrollBy({ left: 200, behavior: 'smooth' }); toast('Geser untuk melihat kenangan lainnya.'); });
document.querySelectorAll('.gallery-card').forEach((card, index) => card.addEventListener('click', () => toast(`Kenangan ${index + 1} untuk kita ♡`)));
