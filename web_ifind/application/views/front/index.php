    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-xs-12 mid">


            <div class="form-group">
                <?php
                echo form_open('showorder');
                ?>
                <div class="input-group input-group-sm">
                    <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Enter your order number" class="form-control" id="order">
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="margin-left: 16px; width: 63px; background-color: #25589B; color: #FFF;">Find</button>
                    </span>
                </div>
                <?php
                echo form_close();
                ?>
            </div>


                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container-fluid no-padding">
            <div class="row-fluid">
                <div class="col-lg-12 btn-padding">
                    <a href="#"><img id="btn-tracking" src="<?php echo base_url();?>assets/images/btn_myTrackOrder_normal.png" class="clickbtn"></a>
                </div>
            </div>

            <div class="row-fluid">
                <div class="col-lg-12 btn-padding">
                    <script type="text/javascript"> 
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 
'//support.itruemart.com/scripts/track.js', 
function(e){ LiveAgent.createButton('db2394d3', e); }); 
</script>
                </div>
            </div>
        </div>
    </section>