<?php

function convert_youtube_to_embed($url) {

if (empty($url) || !is_string($url)) {
    return $url;
}

$watch_pattern = '/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/';

$short_pattern = '/^(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]+)/';

if (preg_match($watch_pattern, $url, $matches)) {
    $video_id = $matches[1];
    return 'https://www.youtube.com/embed/' . $video_id;
}

if (preg_match($short_pattern, $url, $matches)) {
    $video_id = $matches[1];
    return 'https://www.youtube.com/embed/' . $video_id;
}

if (strpos($url, 'youtube.com/embed/') !== false) {
    return $url;
}

return $url;
}


function get_youtube_video_id($url) {

if (empty($url) || !is_string($url)) {
    return false;
}

$watch_pattern = '/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/';

$short_pattern = '/^(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]+)/';

$embed_pattern = '/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/embed\/([a-zA-Z0-9_-]+)/';

if (preg_match($watch_pattern, $url, $matches)) {
    return $matches[1];
}

if (preg_match($short_pattern, $url, $matches)) {
    return $matches[1];
}

if (preg_match($embed_pattern, $url, $matches)) {
    return $matches[1];
}

return false;
}


function convert_vimeo_to_embed($url) {
    if (empty($url) || !is_string($url)) {
        return $url;
    }

    $video_id = get_vimeo_video_id($url);
    if ($video_id) {
        return 'https://player.vimeo.com/video/' . $video_id;
    }

    // Already an embed URL?
    if (strpos($url, 'player.vimeo.com/video/') !== false) {
        return $url;
    }

    return $url;
}

// Get Vimeo Video ID from URL
function get_vimeo_video_id($url) {
    if (empty($url) || !is_string($url)) {
        return false;
    }

    // Match standard Vimeo URL: vimeo.com/12345678
    $pattern_standard = '/vimeo\.com\/(\d+)/';

    // Match player embed URL: player.vimeo.com/video/12345678
    $pattern_embed = '/player\.vimeo\.com\/video\/(\d+)/';

    if (preg_match($pattern_standard, $url, $matches)) {
        return $matches[1];
    }

    if (preg_match($pattern_embed, $url, $matches)) {
        return $matches[1];
    }

    return false;
}
