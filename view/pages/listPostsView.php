<div class="container">
    <h1 class="pageTitle">Liste des posts :</h1>      
    <div class="row">
    <?php foreach($postsList as $item){ if($item->isVerified()){?>
        <div class="col-lg-4 postItem">
            <h4 class='title'><?php echo $item->title(); ?></h4>
            <p class="subject"><?php echo $item->subject(); ?></p>
            <p class="description"><?php echo $item->description(); ?></p>
        </div>
    <?php }} ?>
    <div>
<div>