<?php
include 'partial/_config.php';
?>
<nav class="navbar navbar-expand-lg py-1">
    <a class="navbar-brand" href="index.php">BUP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="catDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="catDropdown">
                    <?php
                    $sql = "select * from books_category_tbl";
                    $result = $conn->query($sql);
                    if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                            echo '<a class="dropdown-item" href="books.php?id=' . $rows['id'] . '">' . $rows['cat_name'] . '</a>';
                        }
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="author" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Authors
                </a>
                <div class="dropdown-menu" aria-labelledby="author">
                    <a class="dropdown-item" href="invitations.php">Invitation to authors</a>
                    <a class="dropdown-item" href="proposals.php">Submit a proposal</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="events.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="specimen_request.php">Specimen Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact-us.php">Contact Us</a>
            </li>
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li></ul>
                '; ?>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"> <?php if (isset($_SESSION['name'])) {
                                                                                            echo $_SESSION['name'];
                                                                                            echo '<img class="img-profile rounded-circle ml-2" src="images/user.png" height="30px">';
                                                                                        } ?> </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php
            } else {
                echo ' <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li></ul>';
            }
            ?>
    </div>
</nav>