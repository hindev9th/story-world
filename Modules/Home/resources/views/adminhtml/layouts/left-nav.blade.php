<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item"><a class="nav-link active" href="index.html">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="cast"></span>
                            </span>
                            <span class="nav-link-text">Dashbboard</span></div>
                    </a></li>
                <li class="nav-item">
                    <p class="navbar-vertical-label">Pages</p>
                    <a class="nav-link" href="{{ route('admin.tag.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="tag"></span>
                            </span>
                            <span class="nav-link-text">Tags</span>
                        </div>
                    </a>
                    <a class="nav-link dropdown-indicator" href="#errors" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="errors">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center">
                                <span class="fas fa-caret-right fs-0"></span>
                            </div>
                            <span class="nav-link-icon">
                                <span data-feather="book"></span>
                            </span>
                            <span class="nav-link-text">Story</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent" id="errors">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.story.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Stories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/errors/500.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Episodes</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </div>
        <div class="navbar-vertical-footer">
            <a class="btn btn-link border-0 fw-semi-bold d-flex ps-0" href="#!"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="navbar-vertical-footer-icon" data-feather="log-out"></span>
                <span>Sign out</span>
            </a>
        </div>

        <form id="logout-form" action="{{ route('admin.logout.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
