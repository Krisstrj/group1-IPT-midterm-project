<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Navigation -->

    <!-- Books -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#books-nav">
        <i class="bi bi-book"></i>
        <span>Books</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="books-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="dashboard.php?section=books-list">
            <i class="bi bi-circle"></i>
            <span>Books List</span>
            <small class="text-muted ms-2">250 Books</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=add-book">
            <i class="bi bi-circle"></i>
            <span>Add New Book</span>
            <small class="text-muted ms-2">Add "The Great Gatsby"</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=book-reports">
            <i class="bi bi-circle"></i>
            <span>Book Reports</span>
            <small class="text-muted ms-2">10 Overdue Books</small>
          </a>
        </li>
      </ul>
    </li><!-- End Books Nav -->

    <!-- Categories -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#categories-nav">
        <i class="bi bi-tags"></i>
        <span>Categories</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="categories-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="dashboard.php?section=categories-list">
            <i class="bi bi-circle"></i>
            <span>Categories List</span>
            <small class="text-muted ms-2">Fiction, Non-Fiction, Sci-Fi</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=add-category">
            <i class="bi bi-circle"></i>
            <span>Add New Category</span>
            <small class="text-muted ms-2"> Add "Biography"</small>
          </a>
        </li>
      </ul>
    </li><!-- End Categories Nav -->

    <!-- Authors -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#authors-nav">
        <i class="bi bi-person"></i>
        <span>Authors</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="authors-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="dashboard.php?section=authors-list">
            <i class="bi bi-circle"></i>
            <span>Authors List</span>
            <small class="text-muted ms-2">J.K. Rowling, George Orwell</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=add-author">
            <i class="bi bi-circle"></i>
            <span>Add New Author</span>
            <small class="text-muted ms-2">Add "Stephen King"</small>
          </a>
        </li>
      </ul>
    </li><!-- End Authors Nav -->

    <!-- Borrowers -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#borrowers-nav">
        <i class="bi bi-people"></i>
        <span>Borrowers</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="borrowers-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="dashboard.php?section=borrowers-list">
            <i class="bi bi-circle"></i>
            <span>Borrowers List</span>
            <small class="text-muted ms-2">John Doe, Jane Smith</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=add-borrower">
            <i class="bi bi-circle"></i>
            <span>Add New Borrower</span>
            <small class="text-muted ms-2">Add "Alice Johnson"</small>
          </a>
        </li>
      </ul>
    </li><!-- End Borrowers Nav -->

    <!-- Transactions -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#transactions-nav">
        <i class="bi bi-arrow-left-right"></i>
        <span>Transactions</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="transactions-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="dashboard.php?section=borrowed-books">
            <i class="bi bi-circle"></i>
            <span>Borrowed Books</span>
            <small class="text-muted ms-2">15 Active Borrows</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=returned-books">
            <i class="bi bi-circle"></i>
            <span>Returned Books</span>
            <small class="text-muted ms-2">5 Returns Today</small>
          </a>
        </li>
      </ul>
    </li><!-- End Transactions Nav -->

    <!-- Settings -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#settings-nav">
        <i class="bi bi-gear"></i>
        <span>Settings</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="dashboard.php?section=user-management">
            <i class="bi bi-circle"></i>
            <span>User Management</span>
            <small class="text-muted ms-2">3 Active Users</small>
          </a>
        </li>
        <li>
          <a href="dashboard.php?section=system-settings">
            <i class="bi bi-circle"></i>
            <span>System Settings</span>
            <small class="text-muted ms-2">Update Library Name</small>
          </a>
        </li>
      </ul>
    </li><!-- End Settings Nav -->

    <!-- Help & Support -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="dashboard.php?section=help-support">
        <i class="bi bi-question-circle"></i>
        <span>Help & Support</span>
        <small class="text-muted ms-2">(Sample: Contact Admin)</small>
      </a>
    </li><!-- End Help & Support Nav -->

  </ul>

</aside><!-- End Sidebar -->