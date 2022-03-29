<div class=" navbar-lightbg-light">
    <!-- Thông tin cá nhân -->
    <a href="/myInfo?id=<?php echo $_SESSION['login']->user_id; ?>">
    <button class="btn btn-light w-100 text-left" style="border-radius: 360px;">
    <img src="/images/user.png" alt="" srcset="" width="40" height="40" class="rounded-circle">
    <label>Thông Tin Cá Nhân</label>
    </button>
    </a>
    <br>
    <a href="/myPost">
        <button class="btn btn-light w-100 text-left" style="border-radius: 360px;">
        <img src="images/writing.png" alt="" srcset="" width="40" height="40">
        <label>Bài Viết Của Tôi</label>
        </button>
    </a>
    <br>
    <a href="/myFriend">
        <button class="btn btn-light w-100 text-left" style="border-radius: 360px;">
        <img src="images/friends.png" alt="" srcset="" width="40" height="40">
        <label>Bạn Bè</label>
        </button>
    </a>
    <br>
    <button class="btn btn-light w-100 text-left" style="border-radius: 360px;">
    <img src="images/time-left.png" alt="" srcset="" width="40" height="40">
    <label>Kỉ niệm</label>
    </button>
    <br>
</div>