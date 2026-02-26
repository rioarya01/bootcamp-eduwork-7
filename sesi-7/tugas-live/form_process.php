<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Processing Result</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <?php
                        $errors = [];
                        $data = [];

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Sanitize and validate inputs
                            $name = trim($_POST['name'] ?? '');
                            $price = trim($_POST['price'] ?? '');
                            $description = trim($_POST['description'] ?? '');
                            $category = trim($_POST['category'] ?? '');
                            $stock = trim($_POST['stock'] ?? '');

                            // Validate name
                            if (empty($name)) {
                                $errors[] = 'Nama Produk is required.';
                            } else {
                                $data['name'] = htmlspecialchars($name);
                            }

                            // Validate price
                            if (empty($price) || !is_numeric($price) || (int)$price <= 0) {
                                $errors[] = 'Harga must be a positive number.';
                            } else {
                                $data['price'] = floatval($price);
                            }

                            // Validate description
                            if (empty($description)) {
                                $errors[] = 'Deskripsi is required.';
                            } else {
                                $data['description'] = htmlspecialchars($description);
                            }

                            // Validate category
                            $valid_categories = ['electronics', 'fashion', 'home', 'beauty'];
                            if (empty($category) || !in_array($category, $valid_categories)) {
                                $errors[] = 'Kategori must be selected from the options.';
                            } else {
                                $data['category'] = htmlspecialchars($category);
                            }

                            // Validate stock
                            if (empty($stock) || !is_numeric($stock) || $stock < 0 || !ctype_digit($stock)) {
                                $errors[] = 'Stock must be a non-negative integer.';
                            } else {
                                $data['stock'] = intval($stock);
                            }

                            if (empty($errors)) {
                                // Valid, show results
                                echo '<h1>Product Submitted Successfully</h1>';
                                echo '<div class="card">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">Product Details</h5>';
                                echo '<p><strong>Nama Produk:</strong> ' . $data['name'] . '</p>';
                                echo '<p><strong>Harga:</strong> Rp ' . number_format($data['price'], 2, ',', '.') . '</p>';
                                echo '<p><strong>Deskripsi:</strong> ' . $data['description'] . '</p>';
                                echo '<p><strong>Kategori:</strong> ' . ucfirst($data['category']) . '</p>';
                                echo '<p><strong>Stock:</strong> ' . $data['stock'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '<a href="tugas.php" class="btn btn-secondary mt-3">Back to Form</a>';
                            } else {
                                // Invalid, show errors
                                echo '<h1>Validation Errors</h1>';
                                echo '<div class="alert alert-danger">';
                                echo '<ul>';
                                foreach ($errors as $error) {
                                    echo '<li>' . $error . '</li>';
                                }
                                echo '</ul>';
                                echo '</div>';
                                echo '<a href="tugas.php" class="btn btn-secondary">Back to Form</a>';
                            }
                        } else {
                            // Not a POST request
                            echo '<h1>Invalid Request</h1>';
                            echo '<p>Please submit the form properly.</p>';
                            echo '<a href="tugas.php" class="btn btn-secondary">Back to Form</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>