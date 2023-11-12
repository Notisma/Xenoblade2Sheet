<form method="GET">
    <fieldset>
        <legend>Login :</legend>
        <p>
            <label for="login_id">Login&#42; :</label>
            <input type="text" name="login" id="login_id" required/>
            <br/><br/>
        </p>
        <p>
            <input type="submit" value="Validate"/>
            <input type="hidden" name="controller" value="Connection"/>
            <input type="hidden" name="action" value="logInOrSignUp"/>
        </p>
    </fieldset>
</form>
