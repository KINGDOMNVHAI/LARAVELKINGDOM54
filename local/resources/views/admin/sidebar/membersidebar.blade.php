<center><h3>Member</h3></center>
<hr>
<li> <!-- class="active" -->
    <a href="{{ route('dashboard') }}">
        <i class="pe-7s-graph"></i>
        <p>{{ __('admin.dashboard') }}</p>
    </a>
</li>
<li>
    <a href="{{ route('security') }}">
        <i class="pe-7s-door-lock"></i>
        <p>{{ __('admin.security') }}</p>
    </a>
</li>
<li>
    <a href="{{ route('user-profile') }}">
        <i class="pe-7s-id"></i>
        <p>{{ __('admin.user_profile') }}</p>
    </a>
</li>
