<?php
session_start();

require_once 'koneksi.php';
require_once __DIR__ . '/components/template.php';

ob_start();

?>

<h1 class="text-primary">Ini adalah Halaman About</h1>

<?php
$content = ob_get_clean();
renderTemplate('About Us', $content, 'about');