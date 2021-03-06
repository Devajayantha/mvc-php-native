<?php

include_once("controllers/CommentController.php");

$controller = new CommentController();
if (isset($_POST['Submit'])) {
    $value = htmlspecialchars($_POST['comment']);
    $notifMessage = $controller->save($value);
}

$result = $controller->index();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Challenge Level 1</title>
    <style>
    .box {
        font-size: 18px;
        height: 120px;
        padding: 20px;
        margin-bottom: 5px;
        border-top: 1px solid black;
    }

    .date {
        font-size: 22px;
        text-align: right;
        margin-bottom: 20px;
        padding-top: 15px;
    }

    .custom-button {
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="container">
        <br>
        <?php if (!empty($notifMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $notifMessage; ?>
            </div>
        <?php endif ?>
        <br>
        <div class="form-comment">
            <form action="index.php" method="post">
                <div class="form-group">
                    <textarea name="comment" cols="30" rows="7" placeholder="Input your comment"
                        class="form-control"></textarea>
                </div>
                <div class="form-group custom-button">
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg">
                        Submit
                    </button>
                </div>
                <br>
            </form>
        </div>
        <?php if (!empty($result)) : ?>
            <div class="show-data">
                <?php foreach ($result as $item) : ?>
                    <div class="box">
                        <div class="text-title">
                            <?php echo nl2br($item['comment']) ?>
                        </div>
                        <div class="date">
                            <?php echo date('d-m-Y H:i', strtotime($item['created_at'])) ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>