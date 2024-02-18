<?php

// Check if the "url" parameter is provided in the query string
if (isset($_GET['url'])) {
    $urlPart = $_GET['url'];
    $targetUrl = "https://tamilyogi.red/" . $urlPart;

    // Use file_get_contents to fetch the webpage content
    $content = file_get_contents($targetUrl);

    // Use a Regular Expression to find the <iframe src="..."> part
    if (preg_match('/<iframe src="([^"]+)"/i', $content, $matches)) {
        $iframeSrc = $matches[1];

        // Fetch the content from the iframe src URL
        $iframeContent = file_get_contents($iframeSrc);

        // Use another Regular Expression to find the "sources: [{file:" pattern
        if (preg_match('/sources:\s*\[\{file:"([^"]+)"/i', $iframeContent, $matches)) {
            $videoSrc = $matches[1];

            // Redirect the browser to the video source URL
            header('Location: ' . $videoSrc);
            exit; // Ensure no further execution happens
        } else {
            echo "Video source not found.";
        }
    } else {
        echo "IFRAME not found.";
    }
} else {
    echo "Please provide a URL parameter.";
}

?>
