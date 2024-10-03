
let timer;
    let timeLeft = 1805; 

    function startTimer() {
       
        clearInterval(timer);

        timer = setInterval(function() {
           
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;

            
            let formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
            let formattedSeconds = seconds < 10 ? "0" + seconds : seconds;

            
            document.getElementById("timer").textContent = `00:${formattedMinutes}:${formattedSeconds}`;

            
            timeLeft--;

            
            if (timeLeft < 0) {
                clearInterval(timer);
                document.getElementById("timer").textContent = "Time's up!";
            }
        }, 1000);
    }

    
    document.getElementById("startButton").addEventListener("click", function() {
        startTimer();
    });
