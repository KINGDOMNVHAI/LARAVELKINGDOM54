<div class="sidebar" data-color="blue" data-image="" style="background-image:url({{asset('admin/img/sidebar-7.jpg')}})">

<!--
    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://kingdomnvhai.info/" class="simple-text">
                KINGDOM NVHAI
            </a>
        </div>

        <!-- Kiểm tra đăng nhập -->

        @if(Auth::check())

        <ul class="nav">
            <!-- Xét phân loại tài khoản để trao quyền -->
            @if(Auth::user()->type == TYPE_ADMIN)
                    <!-- kế thừa template bằng include -->
                    @include('admin/sidebar/membersidebar');
                    @include('admin/sidebar/editorsidebar');
                    @include('admin/sidebar/adminsidebar');
                @elseif (Auth::user()->type == TYPE_EDITOR)
                    @include('admin/sidebar/membersidebar');
                    @include('admin/sidebar/editorsidebar');
                @elseif (Auth::user()->type == TYPE_MEMBER)
                    @include('admin/sidebar/membersidebar');
            @endif

            <!-- <li class="active-pro">
                <a href="upgrade.html">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>

        @endif

    </div>
</div>
