<?php
$size = 9;
echo '<pre>';
for ($row = 1; $row <= $size; ++$row) {
for ($col = 1; $col <= $size; ++$col) {
printf('%3d', $row * $col);
}
echo '<br>';
}
echo '</pre>'
?>
