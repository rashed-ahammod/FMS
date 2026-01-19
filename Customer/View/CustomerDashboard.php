<?php include '../Controller Logic/CustomerDashboardController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Raphael's Kitchen</title>
<link rel="stylesheet" href="../Stylesheet/CustomerDashboard.css">
</head>

<body>

<div class="navbar">
    <h2>Raphael's Kitchen</h2>
    <div class="nav-links">
        <span>Hi, <?php echo htmlspecialchars($user_name); ?></span>
        <a href="../View/Profile.php">My Profile</a>
        <a href="#">My Cart (<?php echo $cart_count; ?>)</a>
        <a href="../View/Order.php">My Orders</a>
        <a href="../Controller Logic/logoutController.php">Logout</a>
    </div>
</div>

<div class="filters">
    <a href="CustomerDashboard.php?category=All" class="filter-btn">All</a>
    <a href="CustomerDashboard.php?category=Burger" class="filter-btn">🍔 Burger</a>
    <a href="CustomerDashboard.php?category=Pizza" class="filter-btn">🍕 Pizza</a>
    <a href="CustomerDashboard.php?category=Pancake" class="filter-btn">🥞 Pancake</a>
    <a href="CustomerDashboard.php?category=Shawarma" class="filter-btn">🌯 Shawarma</a>
    <a href="CustomerDashboard.php?category=Taco" class="filter-btn">🌮 Taco</a>
    <a href="CustomerDashboard.php?category=Poutine" class="filter-btn">🍛 Poutine</a>
    <a href="CustomerDashboard.php?category=Ramen" class="filter-btn">🍜 Ramen</a>
    <a href="CustomerDashboard.php?category=Sushi" class="filter-btn">🍣 Sushi</a>
    <a href="CustomerDashboard.php?category=Cake" class="filter-btn">🍰 Cake</a>
</div>

<div class="dashboard-layout">
       
<!-- Left sidebar content -->
<div class="menu-container">

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="food-card">
            <div class="food-img-box">
                <img src="../Images/<?php echo $row['image']; ?>" alt="Food">
        </div>

        <div class="food-info">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <div class="category-tag"><?php echo $row['category']; ?></div>
                <p class="description">
                    <?php echo htmlspecialchars($row['description']); ?>
                 </p>
                <div class="price">Tk <?php echo $row['price']; ?></div>
                <?php
            if ($row['availability'] == 1) {
                echo '
                    <form method="post">
                        <input type="hidden" name="menu_id" value="'.$row['menu_id'].'">
                        <button type="submit" name="add_to_cart" class="add-btn">
                            Add to Cart
                        </button>
                    </form>
                ';
            } else {
                echo '
                    <span class="unavailable-text">Unavailable</span>
                    <button class="add-btn disabled" disabled>
                        Add to Cart
                    </button>
                ';
            }
            ?>
            </div>
        </div>
<?php
    }
} else {
    echo "<h3>No items found</h3>";
}
?>
</div>

<!-- Right sidebar content -->
 <div class="cart-panel">
    <h3>My Cart</h3>
    <?php
        if (!empty($_SESSION['cart'])) {

            $total = 0; 

            foreach ($_SESSION['cart'] as $item) {

                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
        ?>
        <div class="cart-item">
                    <strong><?php echo $item['name']; ?></strong><br>
                    Qty: <?php echo $item['qty']; ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="menu_id" value="<?php echo $item['menu_id']; ?>">
                        <button name="cart_action" value="increase">+</button>
                        <button name="cart_action" value="decrease">−</button>
                         <button name="cart_action" value="remove">Remove</button>
                    </form>
                    <br>
                    Tk <?php echo $subtotal; ?>
                </div>
        <?php
            }
        ?>
            <hr>
            <strong>Total: Tk <?php echo $total; ?></strong>
            <br><br>
            <hr>

            <div class="cart-actions">

                <form method="post" action="../Controller Logic/OrderController.php">
                     <button type="submit" name="checkout" class="checkout-btn">
                         Checkout
                     </button>
                </form>

                <form method="post">
                    <button type="submit" name="cart_action" value="clear" class="clear-btn">
                        Clear Cart
                    </button>
                </form>

</div>


        <?php
        } else {
            echo "<p>Your cart is empty</p>";
        }
        ?>
    </div>

</div>

<script src="../Js/CustomerDashboard.js"></script>
</body>
</html>