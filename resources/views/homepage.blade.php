<?php
if (session_id() === '')
    session_start();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Totoro milk tea</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }

        .text-orange {
            color: #ff631c;
        }

        .text-green {
            color: #016856;
        }
    </style>

</head>

<body>
    <div class='container'>
        <p><a href="/admin">Go to admin page</a></p>
        <div class="text-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/yFqzSq6T-Iw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <h1 class='text-center'>
            Book đi nào. Mãi bên nhau bạn nhé!
        </h1>
        <p>Top nơi ở sang đón hè đã sẵn sàng trên Travelcon. Book ngay đi nè</p>

        <div class="container row">
            <?php
            if (isset($_SESSION['rooms'])) {
                $arr = $_SESSION['rooms'];
                foreach ($arr as $key => $value) {
                    $imageTemp = 'images/' . $value['image'];
            ?>
                    <div class="card col-md-3 col-12 mr-2">
                        <img class="card-img-top" src = {{asset("$imageTemp")}} alt="Card image cap">
                        <div class="card-body">
                            <div class="card-text row">
                                <div class="text-left text-orange col" style="font-size: 10px;">
                                    <i class="fas fa-star fw"></i>
                                    <i class="fas fa-star fw"></i>
                                    <i class="fas fa-star fw"></i>
                                    <i class="fas fa-star fw"></i>
                                    <i class="fas fa-star fw"></i>
                                </div>
                                <div class="text-right text-orange col" style="font-size: 13px;">25 Review</div>
                            </div>
                            <h5 class="card-title"><?php echo $value['name'] ?></h5>
                            <div class="card-text">
                                <?php echo $value['description'] ?>
                            </div>
                            <div class="card-text row">
                                <div class="text-left text-orange col" style="font-size: 13px;">Giá tiền</div>
                                <div class="text-right col">
                                    <b>
                                        <script>
                                            document.write((<?php echo $value['price'] ?>).toLocaleString("vi", {
                                                style: "currency",
                                                currency: "VND",
                                            }))
                                        </script>
                                    </b>
                                </div>
                            </div>
                            <div class="card-text row">
                                <div class="text-left text-green col" style="font-size: 12px;">Còn 30 phòng</div>
                                <div class="text-right text-green col" style="font-size: 12px;"><i class="fas fa-ticket-alt"></i>
                                    120 đã đặt</div>
                            </div>
                            <p class="card-text"></p>
                            <button type="button" class="btn col-12" style="background-color:  #ff631c !important; color:white">Đặt
                                ngay <i class="fas fa-bolt"></i></a>
                        </div>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>