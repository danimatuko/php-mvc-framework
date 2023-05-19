<?php

/**
 * HTML template for the blog pages.
 *
 * This template includes the header navigation and the main content area.
 * The $title variable is used to set the title of the page, defaulting to "Blog".
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <title><?= $title ?? 'Blog' ?></title>
</head>

<body>
    <header>
        <nav>
            <a href="/">
                <img alt="Logo" src="https://via.placeholder.com/200x70?text=Logo" width=100 height="40">
            </a>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>