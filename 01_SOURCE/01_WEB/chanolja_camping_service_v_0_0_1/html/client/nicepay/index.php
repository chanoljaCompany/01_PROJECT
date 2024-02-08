<?php
header("Content-Type:text/html; charset=utf-8;");
$uniqId = uniqid();
$clientId = "R1_9a7a3e2d67a740818368170595af5ce4";

?>
<!DOCTYPE html>
<html>

<head>
  <title>Nicepay php</title>
  <meta httpEquiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
  <h1>NICEPAY TEST</h1>
  <button onclick="clientAuth()">clientAuth 결제하기</button>

  <script src="https://pay.nicepay.co.kr/v1/js/"></script>

  <script>
    function clientAuth() {
      AUTHNICE.requestPay({
        clientId: '<?php echo($clientId)?>',
        method: 'card',
        orderId: '<?php echo($uniqId)?>',
        amount: 100,
        goodsName: '나이스페이-상품',
        returnUrl: 'https://sajunara.co.kr/nicepay/response.php',
        fnError: function (result) {
          alert('개발자확인용 : ' + result.errorMsg + '')
        }
      });
    }
  </script>
</body>

</html>
