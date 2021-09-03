<!DOCTYPE html>
<html>
    <header>
        <title>OTP</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=base_url('assets/css/my.css')?>">
        <style>
        a{
        text-decoration:none;
        }
        </style>
    <header>
<body>
<br>
<div class="w3-row">
    <div class="w3-half w3-card-2 w3-round">
        <div class="w3-container w3-center w3-green">
            <h2>OTP</h2>
        </div>
        <br>
        <div style="text-align: center; background: red; color:white;">
         <?php 
            if($this->session->flashdata('error')) 
            { 
                echo $this->session->flashdata('error');
            }
         ?>
         </div>
         <?=form_open('email/otp_verify')?>
            <br>
            <br>
            <p><input class="w3-input w3-border w3-round" type="password" placeholder="Please check OTP" name="otpvalue"><td class="error"><?php echo form_error('otpvalue'); ?></td></p>
            <p class="w3-center"><button class="w3-btn w3-green w3-round" style="width:100%;height:40px" name="save">Submit</button></p>
        </form>
         
        <div>
        </div>
        <br>
        <div class="w3-container w3-center w3-light-grey">
        <h4>Mohit Rawat -- Php Developer</h4>
        </div>
    </div>
    <div class="w3-half">
    </div>
</div>
</body>
</html>