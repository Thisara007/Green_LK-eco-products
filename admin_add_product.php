<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 2rem;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-container input, 
        .form-container textarea,
        .form-container button {
            width: 100%;
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-container button {
            background-color: #66ff66;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #55cc55;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Product</h2>
        <?php 
        require_once 'dbconfi.php';
        if(isset($_POST['submit'])){
            $P_name =$_POST['product_name'];
            $P_img =$_FILES['product_img']['name'];
            $P_tmp = $_FILES['product_img']['tmp_name'];
            $P_price =$_POST['product_price'];
            $P_dis =$_POST['product_dis'];
            $P_stock =$_POST['product_stock'];

                $targetpath = "upload_img/" .$P_img  ;
                move_uploaded_file($P_tmp,$targetpath); 
                //echo "$P_img";
                $sql = "INSERT INTO products(product_name,product_img,product_price,product_dis,product_stock) VALUES('$P_name','$P_img','$P_price','$P_dis','$P_stock');";

                if(mysqli_query($connect,$sql)){
                    echo "<script>alert('Product added successfully!');</script>";
                }else{
                    echo "<script>alert('ERROR!,Please try again');';</script>";
                }

            echo "done";
            }

            if(isset($_GET['update_id'])){
                $select_id = $_GET['update_id'];
                $select_sql = "SELECT * FROM products WHERE product_id = $select_id;";
            
                $result=mysqli_query($connect,$select_sql) ;
                $row=mysqli_fetch_assoc($result);
                    $update_product_name=$row["product_name"];
                    $update_product_price=$row["product_price"];
                    $update_product_dis=$row["product_dis"];
                    $update_product_stock=$row["product_stock"];
        
        ?>
        <form action="admin_add_product.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="product_name" value="<?php echo "$update_product_name" ?>" Name required>
            <input type="number" name="product_price" value="<?php echo "$update_product_price" ?>" step="0.01" required>
            <input type="number" name="product_dis" value="<?php echo "$update_product_dis" ?>"  required>
            <input type="number" name="product_stock" value="<?php echo "$update_product_stock" ?>" required>
            <button type="submit" name="submit_update">Update Product</button>
        </form>
    </div>
    <?php 
         if(isset($_POST['submit_update'])){
            $P_name =$_POST['product_name'];
           // $P_img =$_FILES['product_img']['name'];
            $P_price =$_POST['product_price'];
            $P_dis =$_POST['product_dis'];
            $P_stock =$_POST['product_stock'];

             //   $targetpath = "upload_img/". $P_img;
              //  move_uploaded_file($P_img,$targetpath); 

                $sql = "UPDATE products SET product_name='$P_name',product_price='$P_price',product_dis='$P_dis',product_stock='$P_stock' WHERE product_id = $select_id;";

                if(mysqli_query($connect,$sql)){
                    echo "<script>alert('Product Update successfully!');</script>";
                    echo "<script>window.location.href='admin.php';</script>";
                }else{
                    echo "<script>alert('ERROR!,Please try again');';</script>";
                }

            echo "done";
            }
        

            } else{ ?>
            <form action="admin_add_product.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="file" name="product_img" accept="image/*" required>
            <input type="number" name="product_price" placeholder="Product Price" step="0.01" required>
            <input type="number" name="product_dis" placeholder="Discount (%)" step="0.01" required>
            <input type="number" name="product_stock" placeholder="Stock Quantity" required>
            <button type="submit" name="submit">Add Product</button>
        </form>
    </div>
            <?php
            }  
    
    ?>
</body>
</html>