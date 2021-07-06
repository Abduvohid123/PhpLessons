<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    include_once __DIR__ . "/../basic_bootstrap_css_js.php";
    $connect = mysqli_connect('localhost', 'user', 'password', 'phplessons')
    ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>

<div class="container">

    <div class="row mt-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header bg-dark text-white">

                    Barcha mamlakatlarni ko'rish
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>

                        </tr>
                        </thead>
                        <tbody class="position">
                        <?php
                        $sql = "select * from countries ORDER BY display_id";
                        $select_data = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($select_data) > 0) {
                            while ($row = mysqli_fetch_array($select_data)) {

                                ?>
                                <tr id=" <?= $row['id'] ?>">
                                    <td>
                                        <?= $row['id'] ?>

                                    </td>
                                    <td>
                                        <?= $row['name'] ?>
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


<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    $('.position').sortable({
        delay:150,
        stop:function () {
            var select_data=[];
            $('.position>tr').each(function () {
                select_data.push($(this).attr('id'))
            });

            update(select_data)
        }
    });
    function update(data1) {
        $.ajax({
            url:"ajax.php",
            type:"post",

            data:{
                all_data:data1
            }
        })
    }
</script>
</body>
</html>