<?php
echo '
        <section class="login-section justify-content-center d-flex">
            <div class="login-div">
                <form action="includes/profile.inc.php" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Picture.." name="picture">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Bio.." name="bio">
                            </div>
                        </div>                        
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Instagram.." name="instagram">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Twitch.." name="twitch">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Twitter.." name="twitter">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Unsplash.." name="unsplash">
                            </div>
                        </div>
                        <div class="form-button d-flex justify-content-center col-9">
                            <button type="submit" class="btn btn-success" name="submit">Güncelle</button>
                        </div>';
echo '
                    </div>
                </form>
                <form action="includes/profileDelete.inc.php" method="POST">
                    <button type="submit" class="btn btn-error" name="submit">Delete</button>
                </form>
            </div>
        </section>';