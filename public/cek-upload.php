<?php
header('Content-Type: text/plain; charset=utf-8');

echo "PHP Version: " . PHP_VERSION . PHP_EOL;
echo "Upload max: " . ini_get('upload_max_filesize') . PHP_EOL;
echo "POST max: " . ini_get('post_max_size') . PHP_EOL;
