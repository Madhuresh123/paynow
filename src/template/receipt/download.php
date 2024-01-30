<?php
function my_sc1_fun() {

ob_start();

$plugin_dir = plugin_dir_path(__FILE__);
$template_path = $plugin_dir . 'src/template/pdf.php';

// Debugging: Print the file path
//echo 'Template Path: ' . $template_path . '<br>';

if (file_exists($template_path)) {
    include $template_path;
} else {
    echo 'Error: Template file not found.';
}

$output = ob_get_clean();
return $output;

// include "src/template/donate.php";
}
?>