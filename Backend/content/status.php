<?php
$statres = $conn->query("SELECT status.S_id, status.S_stat FROM S_status WHERE U_id = '$studid' LIMIT 1");
mysqli_close($conn);
?>

<section class="middle">
    <div class="container mt-3">
        <h1>SwanHub</h1>
        
        <form id="myForm" action="includes/posts.php" method="post">
        <input name="stat"  id="stat" type="text" placeholder="Enter Student ID"/>

        <button id="stat_up">post</button>
        </form>
        
        <?php foreach($statuses as $status): ?>
            <div>
                <p><?php echo $status->S_status; ?></p>
            </div>
        <?php endforeach; ?>
        
            
    </div>
</section>