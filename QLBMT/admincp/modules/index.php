<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header("Location:./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styleadmincp.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Admin Page</title>
</head>
<body>
    <h3 class="title_admin">Welcome to Admin Page</h3>
    <div class="wrapper">
    <?php
    include("../config/config.php");
    include("./header.php");
    include("./menu.php");
    include("./main.php");
    include("./footer.php");
    ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        CKEDITOR.replace( 'noidung' );
        CKEDITOR.replace( 'tomtat' );
        CKEDITOR.replace( 'thongtinlienhe' );
    </script>
    <script type="text/javascript">
        new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2018',order: 40000000, sales: 15, quantity: 60 },
    { year: '2019',order: 100000000, sales: 30, quantity: 90 },
    { year: '2020',order: 120000000, sales: 35, quantity: 95 },
    { year: '2021',order: 90000000, sales: 25, quantity: 85 },
    { year: '2022',order: 35000000, sales: 10, quantity: 55 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value','order','sales','quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
});

    </script>
</body>
</html>