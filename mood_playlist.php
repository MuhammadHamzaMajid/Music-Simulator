<?php

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$mood_songs = [
    'happy' => [
        ['name' => 'Love Letter _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/happy/happy1_luv_letter.mp3'],
        ['name' => '8_ora_munka _ Hungarian&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/happy/happy2_8_ora_munka.mp3'],
        ['name' => 'Dard e Disco _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','url' => 'audio/happy/happy3_Dard-E-Disco.mp3']
    ],
    'sad' => [
        ['name' => 'Tum Bin Kya He Jeena _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/sad/sad1_tum_bin.mp3'],
        ['name' => 'Layi Vi Na Gayi _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/sad/sad2_layi_vi_na_gayi.mp3'],
        ['name' => 'Chaha Hae Tujhko _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/sad/sad3_chaha hae tujhko.mp3']
    ],
    'energetic' => [
        ['name' => 'Jana Samjho Na _ Rishi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/energetic/energetic1_jana_samjho_na.mp3'],
        ['name' => 'Chunnari CHunnari _ Alka&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/energetic/energetic2_chunnari_chunnari.mp3'],
        ['name' => 'Ye Ishq Hae _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/energetic/energetic3_ye_ishq_hae.mp3']
    ],
    'relaxed' => [
        ['name' => 'Jana Samjho Na _ Bhulaiyya3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/relaxed/relaxed1_jana_samjho_na.mp3'],
        ['name' => 'Moonlight - Harnoor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/relaxed/relaxed2_Moonlight - Harnoor.mp3'],
        ['name' => 'Ahista Ahista _ Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'url' => 'audio/relaxed/relaxed3_Ahista.mp3']
    ]
];


$mood = $_POST['mood'] ?? '';

if (array_key_exists($mood, $mood_songs)) {

    echo json_encode($mood_songs[$mood]);
} else {

    echo json_encode([]);
}
?>
