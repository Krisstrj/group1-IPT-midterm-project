<?php
session_start();

// Redirect to login page if the user is not logged inn
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include('database/database.php');
include('partials/header.php');
include('partials/sidebar.php');


$sql = "SELECT * FROM books";
$params = [];
$types = "";

// Search functionality
if (!empty($_GET['search'])) {
    $search = "%" . trim($_GET['search']) . "%"; 
    $sql .= " WHERE title LIKE ? OR author LIKE ? OR genre LIKE ? OR descriptions LIKE ?";
    $types = "ssss";
    $params = array_fill(0, 4, $search); 
}

$stmt = $conn->prepare($sql);
if ($stmt) {
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params); 
    }
    $stmt->execute();
    $books = $stmt->get_result();
} else {
    die("Error preparing query: " . $conn->error);
}

$status = $_SESSION['status'] ?? '';
unset($_SESSION['status']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main id="main" class="main">
        <?php if ($status): ?>
            <div class="alert alert-<?php echo ($status == 'error') ? 'danger' : 'success'; ?> alert-dismissible fade show" role="alert">
                <?php 
                    if ($status == 'created') echo "New record has been created successfully!";
                    elseif ($status == 'updated') echo "Record has been updated successfully!";
                    elseif ($status == 'deleted') echo "Record has been deleted successfully!";
                    else echo "An error occurred.";
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="pagetitle">
            <h1>Books Management System</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Books Collection</h5>
                                <button class="btn btn-primary btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Books</button>
                            </div>

                           

                            <!-- Books Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Genre</th>
                                        <th>Descriptions</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($books->num_rows > 0): ?>
                                        <?php while ($row = $books->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                <td><?php echo htmlspecialchars($row['author']); ?></td>
                                                <td><?php echo htmlspecialchars($row['genre']); ?></td>
                                                <td><?php echo htmlspecialchars($row['descriptions']); ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-sm edit-btn" 
                                                        data-id="<?php echo $row['id']; ?>" 
                                                        data-title="<?php echo $row['title']; ?>" 
                                                        data-author="<?php echo $row['author']; ?>" 
                                                        data-genre="<?php echo $row['genre']; ?>" 
                                                        data-descriptions="<?php echo $row['descriptions']; ?>" 
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-info btn-sm view-btn" 
                                                        data-id="<?php echo $row['id']; ?>" 
                                                        data-title="<?php echo $row['title']; ?>" 
                                                        data-author="<?php echo $row['author']; ?>" 
                                                        data-genre="<?php echo $row['genre']; ?>" 
                                                        data-descriptions="<?php echo $row['descriptions']; ?>" 
                                                        data-bs-toggle="modal" data-bs-target="#viewModal">
                                                        View
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete-btn" 
                                                        data-id="<?php echo $row['id']; ?>" 
                                                        data-title="<?php echo $row['title']; ?>" 
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No records found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Add Books</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="database/create.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="author" class="form-label">Author</label>
                                            <input type="text" class="form-control" id="author" name="author" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="genre" class="form-label">Genre</label>
                                            <input type="text" class="form-control" id="genre" name="genre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descriptions" class="form-label">Description</label>
                                            <textarea class="form-control" id="descriptions" name="descriptions" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Book</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="database/update.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" id="edit-id" name="id">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" id="edit-title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Author</label>
                                            <input type="text" class="form-control" id="edit-author" name="author" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Genre</label>
                                            <input type="text" class="form-control" id="edit-genre" name="genre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" id="edit-descriptions" name="descriptions" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete the book: <strong id="delete-title"></strong>?</p>
                                    <input type="hidden" id="delete-id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">View Book Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Title:</strong> <span id="view-title"></span></p>
                                    <p><strong>Author:</strong> <span id="view-author"></span></p>
                                    <p><strong>Genre:</strong> <span id="view-genre"></span></p>
                                    <p><strong>Description:</strong> <span id="view-descriptions"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Edit Modal
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('edit-id').value = button.getAttribute('data-id');
                document.getElementById('edit-title').value = button.getAttribute('data-title');
                document.getElementById('edit-author').value = button.getAttribute('data-author');
                document.getElementById('edit-genre').value = button.getAttribute('data-genre');
                document.getElementById('edit-descriptions').value = button.getAttribute('data-descriptions');
            });
        });

        // View Modal
        document.querySelectorAll('.view-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('view-title').textContent = button.getAttribute('data-title');
                document.getElementById('view-author').textContent = button.getAttribute('data-author');
                document.getElementById('view-genre').textContent = button.getAttribute('data-genre');
                document.getElementById('view-descriptions').textContent = button.getAttribute('data-descriptions');
            });
        });

        // Delete Modal
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('delete-id').value = button.getAttribute('data-id');
                document.getElementById('delete-title').textContent = button.getAttribute('data-title');
            });
        });

        // Confirm Delete
        document.getElementById('confirmDelete').addEventListener('click', () => {
            const id = document.getElementById('delete-id').value;
            if (id) {
                window.location.href = `database/delete.php?id=${id}`;
            }
        });
    </script>
</body>
</html>