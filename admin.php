<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <style>
                :root {
        --Pgreen: #25be30;
        --Dgreen: #f44336;
        --backgroubnd: #f1f1f1;
        --Tbalck: #000;
        --darkG: #13440e;
        --pureWhite: #fff;
        --BlueE: #ded9c9;
        }
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: capitalize;
        transition: 0.2s linear;
        }

        html {
        font-size: 62.5%;
        scroll-behavior: smooth;
        scroll-padding-top: 5rem;
        overflow-x: hidden;
        }
        .product_table {
        
        align-self: center;
        width: 100%;
        margin: auto ;
        padding: 3rem;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 1rem;
        border: 0.1rem solid rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
        }

        .product_table table {
        align-self: center;
        width: 100%;
        border-collapse: collapse;
        border: 0.1rem solid rgba(0, 0, 0, 0.1);
        padding: 2rem;
        }
        .product_table th, td {
        padding: .5rem;
        text-align: left;
        border-bottom: 1px solid #ddd;
        }
        .product_table th {
        background-color: #66ff66;
        color: #333;
        }
        .product_table tr:hover {
        background-color: #f1f1f1;
        }
        .btn {
                    align-self: center;
                width: 100%;
                margin: auto ;
                padding: 3rem;
                align-items:center;
        }

        a{
            padding: 1rem 2rem;
            font-size: 1.5rem;
            color: #fff;
            background: #66ff66;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 1rem;
}       a:hover {
            background: #55cc55;
        }

    </style>
</head>
<body>
    <section class ="admin">
        <div class = "btn">
            <a href ="product_enter.php">Add Item</a>
        </div>
    <div class="product_table">
                <table>

                    <thead>
                        <tr>
                            <th>item no</th>
                            <th>product code</th>
                            <th>product picture</th>
                            <th>Product Name</th>
                            <th>discount</th>
                            <th>Price</th>
                            <th>details</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once "dbconfi.php";
                            $sql = "SELECT * FROM products;";
                            $result = mysqli_query($connect,$sql);

                           if($row = mysqli_num_rows($result)>0){
                            $i = 1;
                               foreach($result as $item){
                                echo "<tr>";
                                echo "<td>". $i."</td>";
                                echo "<td>". $item["product_id"]."</td>";
                                echo "<td><img src ='includes/upload_img/". $item["product_img"]."' width = '100' height='100'></td>";
                                echo "<td>".$item["product_name"]."</td>";
                                echo "<td>". $item["product_dis"]."</td>";
                                echo "<td>". $item["product_price"]."</td>";
                                echo "<td>". $item["product_stock"]."</td>";
                                echo "<td><a href ='#'>update</a></td>";
                                echo "<td><a href ='#'>delete</a></td>";
                                echo "</tr>";
                                $i = $i+1;
                                }

                           }else{
                            echo "no data added";
                           }
                        ?>
                        
                     
                    </tbody>
                </table>
    </div>
    </section>
</body>
</html>