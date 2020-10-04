<div class="container">
    <h2 class="sub_title">Listes des posts :</h2>
    <div class="row">
    <?php foreach($postsList as $item){ ?>
        <div class="col-lg-4">
            <h4 class='title'><?php echo $item->title(); ?></h4>
            <p class="subject"><?php echo $item->subject(); ?></p>
            <p class="description"><?php echo $item->description(); ?></p>
        </div>
    <?php } ?>
    <div>
<div>