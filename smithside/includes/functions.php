<?php

/*
 * LoadContent
 * Load The Content
 * @param @defauld
 */

function loadContent($where, $default = '') {
    //get the content from url
    // sanitize it for countent

    $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
    $default = filter_var($default, FILTER_SANITIZE_STRING);

    $content = (empty($content)) ? $default : $content;
    //if we have content, then get it and 
    if ($content) {

        $html = include 'content/' . $content . '.php';
        return $html;
    }
}
