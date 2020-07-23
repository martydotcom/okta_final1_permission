<?php view('header', $data); ?>
<section class="hero">
    <div class="hero-body">
        <div class="container">

<?php
    if (isset($data['thank_you'])) {
?>
<div class="notification is-info">
<?php
    echo $data['thank_you'];
?>  
</div>
<?php
    }
?>

<?php
    if (isset($data['loginError'])) {
?>
<div class="notification is-danger">
<?php
    echo $data['loginError'];
?>
</div>
<?php
    }
?>

<?php
    if (isset($_SESSION['username'])) {
?>
            <p class="subtitle is-4">
            Make a booking for a private shopping experience
            <p>
<?php 
    } else {
?>
            <p class="subtitle is-4">
            Log in to make a booking
            </p>
<?php
    }
?>
        </div>
    </div>
</section>
<?php view('footer'); ?>