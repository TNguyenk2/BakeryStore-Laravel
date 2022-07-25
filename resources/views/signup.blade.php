<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name ..." value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" class="form-control" placeholder="Enter age ..." value="<?php if(isset($_POST['age'])) echo $_POST['age'] ?>">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="<?php if(isset($_POST['date'])) echo $_POST['date'] ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter phone ..." value="<?php if(isset($_POST['phone'])) echo $_POST['phone'] ?>">
            </div>
            <div class="form-group">
                <label for="web">Web</label>
                <input type="text" name="web" id="web" class="form-control" placeholder="Enter web ..." value="<?php if(isset($_POST['web'])) echo $_POST['web'] ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address ..." value="<?php if(isset($_POST['address'])) echo $_POST['address'] ?>">
            </div>
            <button type="submit" class="mr-2 btn btn-primary">Ok</button>
        </form>
    </div>

    <div>
        @include ("error")
    </div>

    <div class="container text-center">
        <?php if (isset($user)) {
            foreach ($user as $key => $value) {
                echo '<p>' . $key . ': ', $value . '</p>';
            }
        } ?>
    </div>
</body>

</html>