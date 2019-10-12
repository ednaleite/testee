<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
    function fTeste2(valor, callback) {
  setTimeout(function() {
    alert("Hello");
    callback(valor + 5);
  }, 3000);
}

function fTeste1(valor, callback) {
  fTeste2(valor, callback);
}

fTeste1(10, alert);
  </script>
  <title></title>
</head>
<body>

</body>
</html>