let currentAudio = null; 
let selectedMood = '';


function setMoodAndFetchPlaylist(mood) {
    selectedMood = mood;
    document.body.className = selectedMood; 
    getPlaylist(); 
}


function playSong(songName, songUrl) {
    if (currentAudio) {
        currentAudio.pause(); 
        currentAudio.currentTime = 0;
    }

    currentAudio = new Audio(songUrl);
    currentAudio.play();

    document.getElementById("nowPlayingMessage").innerText = `Now playing: ${songName}`;
    document.getElementById('playButton_' + songName).style.display = 'none';
    document.getElementById('stopButton_' + songName).style.display = 'inline-block';
}


function stopSong(songName) {
    if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
        document.getElementById("nowPlayingMessage").innerText = '';
    }
    document.getElementById('playButton_' + songName).style.display = 'inline-block';
    document.getElementById('stopButton_' + songName).style.display = 'none';
}


function getPlaylist() {
    
    fetch('mood_playlist.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'mood=' + encodeURIComponent(selectedMood)
    })
    .then(response => response.json())
    .then(data => {
        displayPlaylist(data);
    })
    .catch(error => {
        console.error('Error fetching the playlist:', error);
    });
}

function displayPlaylist(songs) {
    var playlistDiv = document.getElementById("playlist");
    playlistDiv.innerHTML = '';

   //adding new html spaces for the songs
    var list = '<ul>';
    songs.forEach(song => {
        list += `
            <li>
                ${song.name} 
                <button class="song-button" id="playButton_${song.name}" onclick="playSong('${song.name}', '${song.url}')">Play</button>
                <button class="song-button" id="stopButton_${song.name}" style="display:none;" onclick="stopSong('${song.name}')">Stop</button>
            </li>`;
    });
    list += '</ul>';
    playlistDiv.innerHTML = list;
    

    playlistDiv.style.display = 'block';
}
