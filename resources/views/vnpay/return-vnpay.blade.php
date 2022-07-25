<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thông tin thanh toán</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

  </head>

  <body>
    <?php
  $vnp_TmnCode = "BKFN189D"; //Mã website tại VNPAY
  $vnp_HashSecret = "JFNEDNNHTOEKYZCNMJJQQCXEWDHPYHNX"; //Chuỗi bí mật
  $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
  // $vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
  $vnp_SecureHash = $_GET['vnp_SecureHash'];
  $inputData = array();
  foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
      $inputData[$key] = $value;
    }
  }
  unset($inputData['vnp_SecureHashType']);
  unset($inputData['vnp_SecureHash']);
  ksort($inputData);
  $i = 0;
  $hashData = "";
  foreach ($inputData as $key => $value) {
    if ($i == 1) {
      $hashData = $hashData . '&' . $key . "=" . $value;
    } else {
      $hashData = $hashData . $key . "=" . $value;
      $i = 1;
    }
  }

  //$secureHash = md5($vnp_HashSecret . $hashData);
  $secureHash = hash('sha256', $vnp_HashSecret . $hashData);
  ?>
    <!--Begin display -->
    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Thông tin đơn hàng</h3>
      </div>
      <div class="table-responsive">
        <div class="form-group">
          <label>Mã đơn hàng:</label>

          <label><?php echo $_GET['vnp_TxnRef'] ?></label>
        </div>
        <div class="form-group">

          <label>Số tiền:</label>
          <label><?= number_format($_GET['vnp_Amount'] / 100) ?> VNĐ</label>
        </div>
        <div class="form-group">
          <label>Nội dung thanh toán:</label>
          <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
        </div>
        <div class="form-group">
          <label>Mã phản hồi (vnp_ResponseCode):</label>
          <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
        </div>
        <div class="form-group">
          <label>Mã GD Tại VNPAY:</label>
          <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
        </div>
        <div class="form-group">
          <label>Mã Ngân hàng:</label>
          <label><?php echo $_GET['vnp_BankCode'] ?></label>
        </div>
        <div class="form-group">
          <label>Thời gian thanh toán:</label>
          <label><?php echo $_GET['vnp_PayDate'] ?></label>
        </div>
        <div class="form-group">
          <label>Kết quả:</label>
          <label>
            <?php
          if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
              $order_id = $_GET['vnp_TxnRef'];
              $money = $_GET['vnp_Amount'] / 100;
              $note = $_GET['vnp_OrderInfo'];
              $vnp_response_code = $_GET['vnp_ResponseCode'];
              $code_vnpay = $_GET['vnp_TransactionNo'];
              $code_bank = $_GET['vnp_BankCode'];
              $time = $_GET['vnp_PayDate'];
              $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);

              echo "GD Thành công";
            } else {
              echo "GD Không thành công";
            }
          } else {
            echo "Chữ ký không hợp lệ";
          }
          ?>

          </label>
          <br>
          <a href="trangchu" class="btn btn-lg btn-info">Quay lại</a>
        </div>
      </div>
      <p>
        &nbsp;
      </p>
      <footer class="footer">
        <p>&copy; Quản lý Tiếng Anh 2020</p>
      </footer>
    </div>
  </body>

</html>
