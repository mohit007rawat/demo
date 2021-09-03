<!DOCTYPE html>
<html>
    <header>
        <title>PHP Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=base_url('assets/css/my.css')?>">
    <header>
<body>
    <div class="w3-row">
        <div class="w3-half w3-card-2 w3-round">
            <div class="w3-container w3-center w3-green">
                <h2>Your Email</h2>
            </div>
            <br>
            <div style="text-align: center; background: #95ed95;">
            <?php 
                if($this->session->flashdata('error')) 
                { 
                    echo $this->session->flashdata('error');
                }
             ?>
             </div>
                 
               <?=form_open('email/index')?>
                    <label class="w3-label w3-text-black"><b>Email</b></label>
                    <p>
                        <input class="w3-input w3-border w3-round" type="text" placeholder="email" value="<?php echo set_value('email'); ?>" name="email">
                        <td class="error"><?php echo form_error('email'); ?></td>
                    </p>
                    <p class="w3-center"><button class="w3-btn w3-green w3-round" style="width:100%;height:40px" name="btn-save">Submit</button></p>
                </form>
            <div class="w3-container w3-center w3-light-grey">
                <h4>Mohit Rawat -- Php Developer</h4>
            </div>
        </div>
        <div class="w3-half">
        </div>
    </div>
</body>
</html>