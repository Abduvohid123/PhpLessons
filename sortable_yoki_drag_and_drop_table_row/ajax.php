<?php
$connect = mysqli_connect('localhost', 'user', 'password', 'phplessons');

$all_data = $_POST['all_data'];

$i = 1;
foreach ($all_data as $key=>$data) {
    $sql = "update countries set display_id = $i where id=$data";
    mysqli_query($connect, $sql);
    $i++;
}
