<div class="row sidebar bg-1 ps-4 py-2">
    <ul class="nav nav-pills flex-column mb-auto" id="sidebarMenu">
        <h5 class="pt-2 px-1 mb-0">Library Management System</h5>
        <hr>
        <li class="nav-item">
            <a href="{{ route('loan') }}" class="nav-link {{ session('current_page') == 'loan' ? 'active' : 'text-black' }}" id="menuItem">
              <i class="bi bi-pencil-square pe-2"></i>
              Book Loan
            </a>
        </li>
        <li>
            <a href="{{ route('book') }}" class="nav-link {{ session('current_page') == 'book' ? 'active' : 'text-black' }}"id="menuItem" >
                <i class="bi bi-book pe-2"></i>
                Book Data
            </a>
        </li>
        <li>
            <a href="{{ route('member') }}" class="nav-link {{ session('current_page') == 'member' ? 'active' : 'text-black' }}" id="menuItem">
                <i class="bi bi-person pe-2"></i>
                Member
            </a>
        </li>
        <hr>
        <li>
            <a href="{{ route('logout') }}" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right pe-2"></i>
                Logout
            </a>
        </li>
    </ul>
</div>