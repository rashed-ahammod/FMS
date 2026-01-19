<?php include '../Controller Logic/ReviewController.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Write Review</title>
    <link rel="stylesheet" href="../Stylesheet/Review.css">
</head>
<body>

<div class="review-container">

<h2>Write Your Review</h2>

<form method="post" action="../Controller Logic/ReviewController.php">

    <!-- PASS ORDER ID -->
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

    <textarea name="feedback_message"
              placeholder="Write your review..."
              required></textarea>

    <button type="submit" name="submit_review">
        Submit Review
    </button>

</form>

</div>

</body>
</html>
