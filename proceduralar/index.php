<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include __DIR__ . '/../basic_bootstrap_css_js.php'; ?>
</head>
<body>
<?php

$connect = mysqli_connect('localhost', 'user', 'password', 'phplessons');

if (isset($_GET['delete'])){
    mysqli_query($connect, "call delete_country(".$_GET['delete'].")");

}
if (isset($_POST['btn_edit'])) {
    mysqli_query($connect, "call update_country(".$_GET['edit'].",'".$_POST['country_name']."')");
}
if (isset($_POST['btn_add'])) {

    $insert_sql = "call insert_country('" . $_POST['country_name'] . "')";

    if (mysqli_query($connect, $insert_sql)) {
        header('location:index.php?inserted=1');
    }
}
?>
<div class="container">

    <div class="row mt-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header bg-dark text-white">

                    Barcha mamlakatlarni ko'rish
                </div>
                <div class="card-body">
                    <form name="add_country" method="post">

                        <div class="form-group">
                            <label for="name">Country Name:</label>
                            <input required type="text" class="form-control" placeholder="Mamlakat nomini kiriting"
                                   id="name"
                                   name="country_name">
                        </div>
                        <div class="form-group">


                                <div class="col-4 offset-4">
                                    <input type="submit" name="btn_add" class="btn btn-block btn-primary" value="Add">
                                </div>


                        </div>
                    </form>
                    <br>
                    <br>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "call get_all_countries()";
                        $select_data = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($select_data) > 0) {
                            while ($row = mysqli_fetch_array($select_data)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['name'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="edit.php?edit=<?= $row['id'] ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="index.php?delete=<?= $row['id'] ?>">Delete</a>
                                    </td>
                                </tr>


                                <?php
                            }
                        } else {

                            ?>
                            <tr>
                                <td colspan="3" class="text-center">No Data</td>
                            </tr>
                            <?php

                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>