<?php
include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];
/*if(!isser($user_id)){
    header('location:login.php');
}*/
if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=$_POST['product_quantity'];
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM 'cart' WHERE name = '$procut_name' AND user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($check_cart_number)>0){
        $message[] = 'already added to cart!';
    }
    else{
        mysqli_query($conn, "INSERT INTO 'cart'(user_id, name,price,quantity, image) VALUES('4user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')'") or die('query failed');
        $message[] = 'product added to cart!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="style.css">
<style>
        .page-turn {
            transition: transform 0.5s ease-in-out;
        }

        .page-turn:hover {
            transform: rotateY(-180deg);
        }
    </style>
<?php include 'header.php'; ?>
<section class="home">
    <div class="content">
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique iste eius error velit, quidem aliquam nisi tempora facere molestias voluptate vero. Nemo enim perspiciatis dolorum aut eaque tenetur minima libero.</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab culpa ipsum cumque dolor, voluptates corporis numquam sequi minima perspiciatis quis dolore reiciendis corrupti qui. Iure harum nesciunt minima sit! Ratione!</p>
        <a href="about.php" class="white-btn"> Discover more</a>
</div>
</section>
<section class="products">
    <h1 class="title">Latest Products</h1>
    <div class="box-container">
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
       <form action="" method="post">
        <img src = "uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
        <div class="name"><?php echo $fetch_products['name']; ?>"></div>
        <div class="price">$<?php echo $fetch_products['price']; ?>">/-</div>
        <input type="number" min="1" name="product_quantity" value="1" class="qty">
        <input type="hidden" name="product_name" value="<?php echo
        $fetch_products['name'];?>">
        <input type="hidden" name="product_price" value="<?php echo
        $fetch_products['price'];?>">
        <input type="hidden" name="product_image" value="<?php echo
        $fetch_products['image'];?>">
        <input type="submit" value="add to car" name="add_to_cart" class="btn">
    </form>
    <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
    </div>
    </section>
    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/about-img.jpg" alt="">
    </div>
    <div class="content">
        <h3> About Us</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores voluptatibus pariatur sequi maxime labore aliquam quo provident nostrum, alias quaerat consectetur ad voluptatem, obcaecati quidem voluptas ratione qui veniam dolor?</p>
        <a href = "about.php" class="btn"> Read More</a>
    </div>
    </div>
    </section>
<section class="home-contact">
    <h3>Have Any Question?</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit est impedit minus nisi ipsam quis quidem labore autem saepe pariatur optio exercitationem aperiam consectetur delectus, soluta, repellendus, molestiae fuga quibusdam!</p>
    <a href="contact.php" class="white-btn"> contact us</a>
    </section>


<?php include 'footer.php';?>
<script src="js/script.js"></script>
    </body>
    </html>





        
        