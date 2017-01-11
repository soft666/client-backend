<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
  <h3>{!! Auth::user()->name !!}</h3>
  <ul class="nav side-menu">
    <li><a><i class="fa fa-home"></i> หน้าหลัก <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="{!! URL::route('getSlide') !!}">รูปภาพสไลด์</a></li>
        <li><a href="{!! URL::route('getHouse') !!}">รูปภาพบ้านพัก</a></li>
        <li><a href="{!! URL::route('getEvent') !!}">รูปภาพกิจกรรม</a></li>
        <li><a href="{!! URL::route('getGallery') !!}">รูปภาพ Gallery</a></li>
      </ul>
    </li>
    <li><a><i class="fa fa-edit"></i> ราคา&บริการ <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="{!! URL::route('getPrice') !!}">ราคาห้องพัก</a></li>
        <li><a href="{!! URL::route('getService') !!}">สิ่งอำนวยความสะดวก</a></li>
      </ul>
    </li>
    <li><a><i class="fa fa-desktop"></i> อัลบั้มรูปภาพ <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="{!! URL::route('getAlbum') !!}">อัลบั้มรูปภาพ</a></li>
      </ul>
    </li>
    <li><a><i class="fa fa-table"></i> แผนที่/ติดต่อเรา <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="{!! URL::route('getContact') !!}">แผนที่/ติดต่อเรา</a></li>
      </ul>
    </li>
  </ul>
</div>
