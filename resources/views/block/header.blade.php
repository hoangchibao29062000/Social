<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="/"><img src="images/facebook.png" alt="" srcset="" width="40" height="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <input type="text" placeholder="Bạn cần tìm...." class="form-control" style="border-radius: 360px; width:250px">
    <ul class="navbar-nav m-auto">
      <!-- Nút Trang Chủ -->
      <li class="nav-item ">
        <a class="nav-link" href="/"><button class="btn btn-light"><img src="images/home.png" alt="" srcset="" width="45" height="45"></button></a>
      </li>
      <!-- Nút Xếp Hạng Bài Viết -->
      <li class="nav-item">
        <a class="nav-link" href="/ranking"><button class="btn btn-light"><img src="images/ranking.png" alt="" srcset="" width="45" height="45"></button></a>
      </li>
      
    </ul>
    <div class="form-inline my-2 ml-auto">
        <!-- Hiển thị Tên Đăng nhập -->
        <a href="/myInfo">
          @if($_SESSION['login']->avatar == null)
            <img src="images/user.png" alt="" srcset="" width="40" height="40" class="rounded-circle">
          @else
            <img src="images/avatar/<?php echo ($_SESSION['login']->avatar);  ?>" alt="" srcset="" width="40" height="40" class="rounded-circle">
          @endif
            <?php
              echo ($_SESSION['login']->name);  
            ?>
        </a>
        <div class="dropdown">
          <button class="dropbtn btn btn-light" style="border-radius: 360px;"><img src="images/caret-down.png" alt="" srcset="" width="30" height="30"></button>
          <div class="dropdown-content">
          <button type="button" class="btn btn-light">
          <img src="images/help.png" width="40" height="40" style="border-radius: 360px;" alt="">
            Trợ giúp & Hỗ trợ
          </button>
          <a href="/logout"class="btn btn-light w-100 text-left">
            <img src="images/logout.png" width="40" height="40" style="border-radius: 360px;" alt="">
            Đăng xuất
          </a>
          </div>
        </div>
        <!-- <button class="btn btn-light" style="border-radius: 360px;"></button> -->
    </div>
  </div>
</nav>