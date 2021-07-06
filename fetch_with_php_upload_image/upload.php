<?php

if (isset($_FILES['image'])){
        $image=$_FILES['image'];

        $extension=pathinfo($image['name'],PATHINFO_EXTENSION);
        // $extension == jpg ,png
        $new_name='images/'.$image['name'];
        move_uploaded_file($image['tmp_name'],$new_name);
        chmod(__DIR__.'/'.$new_name,0777);


        echo json_encode(['image_source'=>$new_name]);
}