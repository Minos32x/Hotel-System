@if (Auth::guard('web')->check())

<p>you are a User</p>

@else

<p class="text-danger">you are logged out User</p>

@endif

@if (Auth::guard('employee')->check())

<p>you are a Emplyee</p>

@else

<p class="text-danger">you are logged out as an Employee</p>

@endif