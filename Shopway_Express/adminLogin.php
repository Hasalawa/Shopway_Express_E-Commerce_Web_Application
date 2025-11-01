<div class="col-12 text-center text-light pt-5 pb-3">
    <h1>ADMIN SIGN IN</h1>
</div>
<div class="col-12 text-center d-none px-5" id="msgdiv4">
    <div class="text-danger text-center" role="alert" id="msg4"></div>
</div>
<div class="col-12 offset-lg-1 col-lg-10 mt-2">
    <label for="">Email</label>
    <input type="email" class="form-control mt-1" placeholder="john@gmail.com" style="box-shadow: 0px 1px 10px 0px;" id="e"/>
    <div class="col-12 d-none" id="msgdiv2">
        <div class="text-danger" role="alert" id="msg2"></div>
    </div>
</div>
<div class="offset-lg-1 col-lg-10 d-grid mt-4">
    <button class="button" onclick="adminVerification();">SEND TO VERIFICATION CODE</button>
</div>
<div class="offset-lg-1 col-lg-10 d-grid mt-4">
    <button class="button" onclick="window.location = 'index.php'">BACK TO CUSTOMER LOGIN</button>
</div>