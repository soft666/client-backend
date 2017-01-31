<template>
  <div>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="textbaner navbar-brand" href="#"><img class="logo" src="../../assets/logo.jpg"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right tabbar" style="margin-top: 24px; font-family:Pattaya;">
            <li><router-link  to="/">หน้าหลัก</router-link></li>
            <li><router-link  to="/price">ราคา/บริการ</router-link></li>
            <li><router-link  to="/album">อัลบั้มรูปภาพ</router-link></li>
            <li><router-link  to="/contact">แผนที่/ติดต่อเรา</router-link></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
</template>

<script>
  export default { }
</script>
