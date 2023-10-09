<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Plans <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{route('plans.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>add plan</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{route('plans.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>view all plans</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Week Plan <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('week-plans.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>add week plan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('week-plans.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>view all week plans</p>
                </a>
            </li>
        </ul>
    </li>
</ul>
