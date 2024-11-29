document.addEventListener("DOMContentLoaded", function () {
  let countdownElement = document.getElementById("countdown");
  let startButton = document.getElementById("startButton");
  let displayWaktumemasak = document.getElementById("displayWaktumemasak");
  let countdown;
  let timeLeft;
  let isRunning = false;

  function parseTime() {
    const cookingTimeText = displayWaktumemasak.innerText.trim();
    const timeParts = cookingTimeText.split(":").map(Number);
    if (timeParts.length !== 3) {
      console.error("Format waktu tidak valid:", cookingTimeText);
      return 0;
    }
    return timeParts[0] * 3600 + timeParts[1] * 60 + timeParts[2];
  }

  startButton.addEventListener("click", function () {
    if (isRunning) {
      clearInterval(countdown);
      isRunning = false;
      startButton.innerHTML = "Mulai";
    } else {
      clearInterval(countdown);
      timeLeft = parseTime();
      if (timeLeft <= 0) {
        countdownElement.innerHTML = "Waktu tidak valid!";
        return;
      }
      countdownElement.innerHTML = formatTime(timeLeft);
      displayWaktumemasak.innerHTML = formatTime(timeLeft);
      isRunning = true;
      startButton.innerHTML = "Jeda";
      countdown = setInterval(function () {
        timeLeft--;
        countdownElement.innerHTML = formatTime(timeLeft);
        displayWaktumemasak.innerHTML = formatTime(timeLeft);

        if (timeLeft <= 0) {
          clearInterval(countdown);
          countdownElement.innerHTML = "Waktu Habis!";
          displayWaktumemasak.innerHTML = "00:00:00";
          isRunning = false;
          startButton.innerHTML = "Mulai";
        }
      }, 1000);
    }
  });

  function formatTime(seconds) {
    const hours = Math.floor(seconds / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;
    return `${hours}:${minutes < 10 ? "0" : ""}${minutes}:${secs < 10 ? "0" : ""}${secs}`;
  }
});

const urlHash = window.location.hash;
if (urlHash) {
  window.addEventListener("scroll", () => {
    if (window.location.hash) {
      history.pushState(
        "",
        document.title,
        window.location.pathname + window.location.search
      );
    }
  });
}
