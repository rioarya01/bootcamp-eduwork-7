<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Input Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <h1>Form Input Produk</h1>
                    <form action="form_process.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Enter Product Description" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select category</option>
                                <option value="electronics">Electronics</option>
                                <option value="fashion">Fashion</option>
                                <option value="home">Home</option>
                                <option value="beauty">Beauty</option>
                            </select>                       
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="stock"
                                name="stock"
                                placeholder="Enter product stock" 
                                required
                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        

        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
                let isValid = true;
                const name = document.getElementById('name').value.trim();
                const price = parseFloat(document.getElementById('price').value);
                const description = document.getElementById('description').value.trim();
                const category = document.getElementById('category').value;
                const stock = parseInt(document.getElementById('stock').value);

                if (name === '') {
                    alert('Nama Produk is required.');
                    isValid = false;
                }
                if (isNaN(price) || price <= 0) {
                    alert('Harga must be a positive number.');
                    isValid = false;
                }
                if (description === '') {
                    alert('Deskripsi is required.');
                    isValid = false;
                }
                if (category === '') {
                    alert('Kategori must be selected.');
                    isValid = false;
                }
                if (isNaN(stock) || stock < 0) {
                    alert('Stock must be a non-negative integer.');
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>