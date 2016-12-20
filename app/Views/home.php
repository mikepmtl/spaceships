

    <div class="row">
        <div id="header-pagination" class="col-md-12">
            <?php echo $page_links; ?>
        </div>
    </div>


    <?php foreach($ships as $ship): ?>

    <div class="row">

        <div class="col-md-offset-2 col-md-6">

            <h1><?php echo $ship->name; ?></h1>

            <div class="spaceship-specs">
                <strong>Length:</strong> <?php echo $ship->length; ?><br />
                <strong>Crew:</strong> <?php echo $ship->crew; ?><br />
                <strong>Passengers:</strong> <?php echo $ship->passengers; ?>
            </div>

            <div class="btn-more-info-wrapper">
                <input name="More Button" class="btn btn-default show-spaceship-details" type="button" value="More Info &raquo;" data-spaceship-url="<?php echo $ship->url; ?>">
            </div>

        </div>

        <div class="col-md-2">
            <img src="<?php echo $ship->image_path; ?>" class="spaceship img-responsive" alt="<?php echo $ship->name; ?>">
        </div>

    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-8"><hr /></div>
    </div>

	<?php endforeach; ?>


    <div id="modal-spaceship-specs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

