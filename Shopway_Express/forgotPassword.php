<div class="col-12 text-center text-light pt-2 px-5 pb-2">
    <h1>Forgot Password</h1>
</div>
<div class="col-12 text-center d-none px-5" id="msgbox1">
    <div class="text-danger text-center" role="alert" id="message"></div>
</div>
<div class="col-12 mt-4 px-5">
    <label for="">Email</label>
    <input type="email" class="form-control mt-1" id="e" placeholder="Ex: john@gmail.com" style="box-shadow: 0px 1px 10px 0px;" />
</div>
<div class="col-12 d-grid mt-4 px-5">
    <button class="button" onclick="verifyCodeSend();">Send Verification Code</button>
</div>
<div class="col-12 d-grid mt-4 mb-5 px-5">
    <button class="button" style="opacity: 43%;" onclick="cancel();">Cancel</button>
</div>