<?php

include_once("controllers/Controller.php");
$controller = new Controller();

if (isset($_POST['Submit'])) {
    $comment = $_POST['comment'];
    $controller->saveNew($comment);
    $result = $controller->newIndex();
}else {
    $result = $controller->newIndex();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Challenge</title>
    <style>
        .box {
            font-size: 18px;
            height: 120px;
            padding: 20px;
            border-top: 1px solid black;
        }

        .date {
            font-size: 22px;
            text-align: right;
            margin-bottom: 20px;
            padding-top: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <br>
        <?php?>
        <?php if (!empty($result["notifMessage"])) :?>
        <div class="alert alert-danger" role="alert">
            <?php echo $result["notifMessage"]; ?>
        </div>
        <?php endif ?>
        <br>
        <div class="form-comment">
            <form action="home.php" method="post">
                <div class="form-group">
                    <textarea name="comment" cols="30" rows="7" placeholder="input your comment" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button><br>
                </div>

            </form>
        </div>
        <div class="show-data">
            <?php foreach ($result{"showData"} as $item) { ?>
                <div class="box">
                    <div class="text-title">
                        <?php echo $item['comment'] ?>
                    </div>
                    <div class="date">
                        <?php echo date('d-m-Y H:i', strtotime($item['created_at'])) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>