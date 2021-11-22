<?php $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); ?>

<?php if (count($errors) > 0):  ?>
 
    <div class="alert alert-dark alert-dismissible fade show center-block" role="alert">
        <?php foreach ($errors as $error): ?>
            <p> <?php echo "$error"; ?></p>
        <?php endforeach ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
     
<?php endif ?>

<?php if(!empty($messages)){?>
 
 <div class="alert alert-success alert-dismissible fade show center-block" role="alert">
  <?php foreach ($messages as $message): ?>
      <p> <?php echo "$message"; ?></p>
  <?php endforeach ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<style> 

.alert-dark {
    padding-bottom: 1px;
    border-style: none;
    border-radius: 2px;
    width: auto;
    font-size: 14px;
}
.alert-success {
    padding-bottom: 1px;
    border-style: none;
    border-radius: 2px;
    width: auto;
    font-size: 14px;
}
.alert {
    font-weight: 400;
    left: 0;
    margin: auto;
    position: relative;
    right: 0;
    bottom: 10px;
    text-align: center;  
    font-size: 14px;
}

</style>
