<ul class="nav nav-tabs">
    <li {{ request()->is('control/resume') ? "class=active" :''}}><a href="{{ url('control/resume') }}">View Resume</a></li>
    <li {{ request()->is('control/resume/personal*') ? "class=active" :''}}><a href="{{ url('control/resume/personal') }}">Personal</a></li>
    <li {{ request()->is('control/resume/education*') ? "class=active" :''}}><a href="{{ url('control/resume/education') }}">Education</a></li>
    <li {{ request()->is('control/resume/training*') ? "class=active" :''}}><a href="{{ url('control/resume/training') }}">Training</a></li>
    <li {{ request()->is('control/resume/professional*') ? "class=active" :''}}><a href="{{ url('control/resume/professional') }}">Professional</a></li>
</ul>
