<?php
                // product details
                    $sql =  "SELECT * FROM products where pid=$productID";
                    $sqlResult = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($sqlResult)) {
                        $productInfo = mysqli_fetch_assoc($sqlResult);
                    } else {
                        echo "0 results";
                    }
