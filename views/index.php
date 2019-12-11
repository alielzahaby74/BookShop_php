<?php
include 'inc/header.php';
?>
<div class="container pt-4">
    <h2>Recent Books</h2>

    <div class="row">
        <?php foreach (get('books') as $book){ ?>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $book ['img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $book['name']; ?>></h5>
                    <p class="card-text"><?php echo $book['description']; ?>></p>
                    <a href="/borrow?book=<?php echo $book['id']; ?>" class="btn btn-primary">Borrow</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
include "inc/footer.php";
?>
