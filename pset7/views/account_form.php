<form action="account.php" method="post">
    <fieldset>
        <!--<div class="form-group">-->
        <!--    <input autocomplete="off" autofocus class="form-control" name="current" placeholder="Current Password"  type="password"/>-->
        <!--</div>-->
        <div class="form-group">
            <label>New Password</label><br>
            <input class="form-control" name="new_password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirm_new" placeholder="Confirm New" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Update
            </button>
        </div>
    </fieldset>
</form>