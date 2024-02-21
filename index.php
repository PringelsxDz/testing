<?php

// Target URL
$url = 'https://tamilgun.group/video/naa-saami-ranga-2024/';

// Fetch the webpage content
$htmlContent = file_get_contents($url);

// Check for failure
if ($htmlContent === false) {
    die("Failed to retrieve the web page content.");
}

// Regular expression to find URLs containing 'arivakam'
// Adjust the pattern if 'arivakam' is part of a longer word or has specific characters around it
$pattern = '/https?:\/\/[^ "\']+arivakam[^ "\']*/i';

// Find matches
if (preg_match_all($pattern, $htmlContent, $matches)) {
    // Check if any URLs were found
    if (!empty($matches[0])) {
        // Output each found URL
        foreach ($matches[0] as $match) {
            echo "Found URL: $match\n";
        }
    } else {
        echo "No URLs containing 'arivakam' were found in the source code.";
    }
} else {
    echo "An error occurred during the search.";
}

?>
