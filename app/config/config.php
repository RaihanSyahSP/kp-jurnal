<?php

if ($_SERVER['SERVER_NAME'] === 'kp-angga.test') {
    // Lingkungan lokal
    require_once 'config.local.php';
} else {
    // Lingkungan produksi
    require_once 'config.production.php';
}