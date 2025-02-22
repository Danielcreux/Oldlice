<?php

include "pais.php";
// Database file
$dbFile = 'logs.sqlite';

// Open SQLite database
$db = new SQLite3($dbFile);

// Create logs table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    epoch INTEGER,
    year INTEGER,
    month INTEGER,
    day INTEGER,
    hour INTEGER,
    minute INTEGER,
    second INTEGER,
    ip TEXT,
    user_agent TEXT,
    screen_x INTEGER,
    screen_y INTEGER,
    domain TEXT,
    page TEXT,
    browser_language TEXT,
    country TEXT
)");

// Capture data
$epoch = time();
$year = date("Y", $epoch);
$month = date("m", $epoch);
$day = date("d", $epoch);
$hour = date("H", $epoch);
$minute = date("i", $epoch);
$second = date("s", $epoch);
$ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$domain = $_SERVER['HTTP_HOST'] ?? 'Unknown';
$page = $_SERVER['REQUEST_URI'] ?? 'Unknown';
$browserLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'Unknown';

// Get screen resolution from JavaScript (requires client-side code)
$screenX = $_POST['screen_x'] ?? 0;
$screenY = $_POST['screen_y'] ?? 0;

// Get country using an external service (optional, requires API)
$country = 'Unknown';

// Insert log data
$stmt = $db->prepare("INSERT INTO logs (epoch, year, month, day, hour, minute, second, ip, user_agent, screen_x, screen_y, domain, page, browser_language, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bindValue(1, $epoch, SQLITE3_INTEGER);
$stmt->bindValue(2, $year, SQLITE3_INTEGER);
$stmt->bindValue(3, $month, SQLITE3_INTEGER);
$stmt->bindValue(4, $day, SQLITE3_INTEGER);
$stmt->bindValue(5, $hour, SQLITE3_INTEGER);
$stmt->bindValue(6, $minute, SQLITE3_INTEGER);
$stmt->bindValue(7, $second, SQLITE3_INTEGER);
$stmt->bindValue(8, $ip, SQLITE3_TEXT);
$stmt->bindValue(9, $userAgent, SQLITE3_TEXT);
$stmt->bindValue(10, $screenX, SQLITE3_INTEGER);
$stmt->bindValue(11, $screenY, SQLITE3_INTEGER);
$stmt->bindValue(12, $domain, SQLITE3_TEXT);
$stmt->bindValue(13, $page, SQLITE3_TEXT);
$stmt->bindValue(14, $browserLanguage, SQLITE3_TEXT);
$stmt->bindValue(15, $country, SQLITE3_TEXT);
$stmt->execute();

echo "Log saved successfully";
?>

