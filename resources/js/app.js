import {
  Livewire,
  Alpine,
} from '../../vendor/livewire/livewire/dist/livewire.esm';

import Tooltip from '@ryangjchandler/alpine-tooltip';

Alpine.plugin(Tooltip);

Livewire.start();

// Functie om video's te initialiseren en autoplay opnieuw te starten
const initializeVideos = () => {
  document.querySelectorAll("video[autoplay]").forEach((video) => {
    video.play().catch((error) => {
      console.warn(`Autoplay prevented: ${error}`);
    });
  });
};

// Event listener voor Livewire navigatie-events
document.addEventListener('livewire:navigated', () => {
  initializeVideos();
});

// Initialiseer video's wanneer de DOM is geladen
document.addEventListener("DOMContentLoaded", () => {
  initializeVideos();
});

// Functie om mute te toggelen
window.toggleMute = function (button) {
  const videoId = button.getAttribute('data-video-id');
  const video = document.getElementById(videoId);

  if (video) {
    document.querySelectorAll('video').forEach((v) => {
      const relatedButton = document.querySelector(`a[data-video-id="${v.id}"]`);
      if (v !== video) {
        v.muted = true;
        if (relatedButton) {
          relatedButton.textContent = 'Unmute';
        }
      }
    });

    video.muted = !video.muted;

    button.textContent = video.muted ? 'Unmute' : 'Mute';
  }
};
