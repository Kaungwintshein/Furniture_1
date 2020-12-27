<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;

        public $product;
        public $category;
        public $orders;
        public $auth;
        public $order_product;
        public $con;


        // class constructor
    public function __construct(
        
        $dbname = "Newdb",
        $product = "Productdb",
        $category = "Productdb",
        $orders = "Productdb",
        $auth = "ProductDb",
        $order_product = "Productdb",
        
        $servername = "localhost",
        $username = "root",
        $password = "123456"
    )
    {
        $this->dbname = $dbname;
        $this->product= $product;
        $this->category = $category;
        $this->orders = $orders;
        $this->auth = $auth;
        $this->order_product = $order_product;

      
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername,$username,$password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        // TBALE1
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $product
                            (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             item_name VARCHAR (255) NOT NULL,
                             category_id INT NOT NULL,
                             price 	VARCHAR (255) NOT NULL,
                             detail VARCHAR (255) NOT NULL,
                             img VARCHAR (255) NOT NULL,
                             created_date DATETIME NOT NULL
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }


        // TBALE2
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $category
                            (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             category_name VARCHAR (255) NOT NULL
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }

        // TBALE3
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $orders
                            (orders_id INT NOT NULL AUTO_INCREMENT,
                            customer_id INT NOT NULL,
                            product_id INT NOT NULL,
                            price VARCHAR(255) NOT NULL,
                            quantity VARCHAR(255) NOT NULL,
                            created_date DATETIME NOT NULL,
                            PRIMARY KEY (orders_id,customer_id,product_id)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }

        // TBALE4
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $auth
                            (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             role VARCHAR (255) NOT NULL,
                             username VARCHAR (255) NOT NULL,
                             password VARCHAR (255) NOT NULL,
                             email VARCHAR (255) NOT NULL,
                             phone VARCHAR (255) NOT NULL,
                             address TEXT,
                             created_date DATETIME NOT NULL
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }




        // TBALE5
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $order_product
                            (order_product_id INT NOT NULL AUTO_INCREMENT,
                             customer_id INT NOT NULL,
                             product_id INT NOT NULL,
                             order_quantity INT NOT NULL,
                             created_date DATETIME NOT NULL,
                             PRIMARY KEY(order_product_id,customer_id,product_id)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }


        // TBALE6
        // if(mysqli_query($this->con, $sql)){

        //     $this->con = mysqli_connect($servername, $username, $password, $dbname);

        //     // sql to create new table
        //     $password = md5('12345');
        //     $sql = "INSERT INTO auth (role,username,password,email,phone,address,created_date)
        //              VALUES('user','kaung','$password','k0@gmail.com','098877839','Eaim',now())";
            
        //     if (!mysqli_query($this->con, $sql)){
        //         echo "Error insert data: " . mysqli_error($this->con);
        //     }

        // }else{
        //     return false;
        // }

        // INSERT INTO auth (role,username,password,email,phone,address,created_date)
        // VALUES('user','kaung','827ccb0eea8a706c4c34a16891f84e7b','k0@gmail.com','098877839','Eaim',now())

        // INSERT INTO auth (role,username,password,email,phone,address,created_date)
        // VALUES('admin','admin','$password','k0@gmail.com','098877839','Eaim',now())
    }

}
?>
