<nav class="navbar navbar-expand-lg py-0">
    <a class="navbar-brand" href="index.php">MSU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_category.php">Add Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_book.php">Add Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="events.php">Add Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="specimen_request.php">Specimen Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="author_proposal.php">Author Proposal</a>
            </li>
        </ul>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600"> Admin</span>
                        <img class="img-profile rounded-circle" src="https://admission.msubaroda.ac.in//applicant/assets/images/user.png" height="35px">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>