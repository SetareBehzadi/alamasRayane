<div class="profile-header">
    <div class="profile-img">
        <img src="/images/user.png" width="200" alt="Profile Image">
    </div>
    <div class="profile-nav-info">
        <h3 class="user-name">{{ auth()->user()->name }}</h3>
        <div class="address">
            <p>{{ auth()->user()->email }}</p>
        </div>

    </div>
    <div class="profile-option">
        <div class="notification" >
            <i class="fa fa-bell"></i>
            <span class="alert-message" title="سفارشات در انتظار تایید شما">{{ count($verified) }}</span>
        </div>
    </div>
</div>
