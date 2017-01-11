<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
<!-- Tab Menu -->
    @include('layout.nav')

<!-- Silde -->
    @include('layout.carousel')

      <div class="container-hack marketing new-bg">

      @yield('content')

      <hr>

      <!-- /END THE FEATURETTES -->


    </div>
     <!-- FOOTER -->

    <div class="footer">
      <div class="container">
        <p>มนต์รักบ้านสวน</p>
        <p>ที่อยู่ : 330/7 หาดหินงาม หมู่ 3 ต.สิชล อ.สิชล จ.นครศรีธรรมราช  80120</p>
        <p>เบอร์โทร : 083-9999823</p>
        <p>E-Mail : google@gmail.com</p>
      </div>
    </div>

  <style>
  .new-bg {
      background-color: white;
      z-index: 1;
      margin-top: -140px;
  }
  .container-hack {
      width: 90%;
      margin-right: auto;
      margin-left: auto;
      padding-left: 15px;
      padding-right: 15px;
      padding-top: 1px;
  }

    .footer {
          padding-top: 50px;
          padding-bottom: 20px;
          color: white;
          text-align: center;
          background-color: #2a2730;
    }
  </style>



    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay : 3000,
        stopOnHover : true,
        navigation:true,
        singleItem : true,
        autoHeight : true,
      });

    });
    </script>

</body>
</html>
