<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="login-form col-lg-5">
            <h1>Create a new Ticket.</h1>
            <form>
                <div class="form-group">
                    <label for="email">Subject</label>
                    <input type="text" class="form-control" name="email" placeholder="john@doe.com">            
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Topic</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">HTML</option>
                    <option value="2">CSS</option>
                    <option value="3">JavaScript</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="pass">Description</label>
                    <textarea rows="10" cols="50" class="form-control" name="pass"></textarea>
                </div>
                <button type="submit" class="btn btn-light" name="btn_login">Create a Ticket!</button>
            </form>
        </div>
        <div class="img col-lg-7 mt-5">
            <img src="../../images/vigi_02.png" alt="">
        </div>
    </div>    
</div>
<?php include "../../View/inc/footer.php" ?>