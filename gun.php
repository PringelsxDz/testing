<?php

// Target URL
$url = 'https://tamilgun.group/video/naa-saami-ranga-2024/';

// Fetch the webpage content
$htmlContent = file_get_contents($url);

// Check for failure
if ($htmlContent === false) {
    die("Failed to retrieve the web page content.");
}

// Regular expression to find the iframe src URL within the JavaScript code
$pattern = '/src=\\"(https?:\\\\/\\\\/player2\.arivakam\.net\\\\/player\\\\/\?id=[a-zA-Z0-9]+)\\"/';

// Find matches
if (preg_match($pattern, $htmlContent, $matches)) {
    // Check if any URLs were found
    if (!empty($matches[1])) {
        // Decode the found URL (to convert escape sequences back to normal characters)
        $foundUrl = stripslashes($matches[1]);

        // Output the found URL
        echo "Found URL: $foundUrl\n";
    } else {
        echo "No video URL was found in the source code.";
    }
} else {
    echo "An error occurred during the search.";
}

?>
