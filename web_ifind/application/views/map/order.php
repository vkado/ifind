<div>
    <?php
    echo form_open('tracking');
    ?>
    <div class="form-group form-group-lg">
        <div class="col-md-6">
            <input type="text" class="form-control" name="order" id="order" value="<?php echo $order; ?>" placeholder="<?php echo $this->lang->line('search_order_id'); ?>">
        </div>
    </div>

    <div class="col-md-6">
        <?php echo anchor('', $this->lang->line('search'), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
    </div>
    <?php
    echo form_close();
    ?>
</div>
<div>
    <div class="form-group form-group-lg">
        <?php
        echo $error;
        ?>
    </div>
</div>