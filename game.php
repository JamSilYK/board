<?php
session_start();
if($_SESSION["user_email"] == null){
  echo("<script>location.href='../login.php';</script>");
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php
include 'include/head.php';
include 'include/left_nav.php';
include 'include/jq.php';
?>

<body>
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row" style="background-color:#152036">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper" style="background-color:red;">
                <div class="row" style="background-color:#1b2a47;">
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                      <button type="button" id="bt_logout" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn" style="background-color:#152036; border-color:black; float:left;">
                        로그아웃
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12" style="">
                    <div class="header-top-menu tabl-d-n hd-search-rp">
                      <div class="breadcome-heading">
                        <form role="search" class="">
                          <input type="text" placeholder="Search..." class="form-control">
                          <a href=""><i class="fa fa-search"></i></a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container-fluid" style="height:70px">

            </div>

          </div>
          <div class="row" style="background-color:#152036;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="review-tab-pro-inner">
                <ul id="myTab3" class="tab-review-design">
                  <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>GAME</a></li>

                </ul>
                <div id="myTabContent" class="tab-content custom-product-edit">
                  <div class="product-tab-list tab-pane fade active in" id="description">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="review-content-section">
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="" aria-hidden="true">맨유</i></span>
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="" aria-hidden="true">맨유</i></span>
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="" aria-hidden="true">맨유</i></span>
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="" aria-hidden="true">맨유</i></span>
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="" aria-hidden="true">맨유</i></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="review-content-section">
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Last Name">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="icon nalika-favorites-button" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Product Description">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Sale Price">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon"><i class="icon nalika-like" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Category">
                          </div>
                          <select name="select" class="form-control pro-edt-select form-control-primary">
                            <option value="opt1">Select One Value Only</option>
                            <option value="opt2">2</option>
                            <option value="opt3">3</option>
                            <option value="opt4">4</option>
                            <option value="opt5">5</option>
                            <option value="opt6">6</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="text-center custom-pro-edt-ds">
                          <button type="button" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                          </button>
                          <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-tab-list tab-pane fade" id="reviews">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="pro-edt-img">
                                <img src="img/new-product/5-small.jpg" alt="">
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="product-edt-pix-wrap">
                                    <div class="input-group">
                                      <span class="input-group-addon">TT</span>
                                      <input type="text" class="form-control" placeholder="Label Name">
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-radio">
                                          <form>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                              </label>
                                            </div>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                              </label>
                                            </div>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Small Image
                                              </label>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="product-edt-remove">
                                          <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Remove
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="pro-edt-img">
                                <img src="img/new-product/6-small.jpg" alt="">
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="product-edt-pix-wrap">
                                    <div class="input-group">
                                      <span class="input-group-addon">TT</span>
                                      <input type="text" class="form-control" placeholder="Label Name">
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-radio">
                                          <form>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                              </label>
                                            </div>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                              </label>
                                            </div>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Small Image
                                              </label>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="product-edt-remove">
                                          <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Remove
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="pro-edt-img mg-b-0">
                                <img src="img/new-product/7-small.jpg" alt="">
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="product-edt-pix-wrap">
                                    <div class="input-group">
                                      <span class="input-group-addon">TT</span>
                                      <input type="text" class="form-control" placeholder="Label Name">
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-radio">
                                          <form>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                              </label>
                                            </div>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                              </label>
                                            </div>
                                            <div class="radio radiofill">
                                              <label>
                                                <input type="radio" name="radio"><i class="helper"></i>Small Image
                                              </label>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="product-edt-remove">
                                          <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Remove
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-tab-list tab-pane fade" id="INFORMATION">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                          <div class="card-block">
                            <div class="text-muted f-w-400">
                              <p>No reviews yet.</p>
                            </div>
                            <div class="m-t-10">
                              <div class="txt-primary f-18 f-w-600">
                                <p>Your Rating</p>
                              </div>
                              <div class="stars stars-example-css detail-stars">
                                <div class="review-rating">
                                  <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label class="full" for="star5"></label>
                                    <input type="radio" id="star4half" name="rating" value="4 and a half">
                                    <label class="half" for="star4half"></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label class="full" for="star4"></label>
                                    <input type="radio" id="star3half" name="rating" value="3 and a half">
                                    <label class="half" for="star3half"></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label class="full" for="star3"></label>
                                    <input type="radio" id="star2half" name="rating" value="2 and a half">
                                    <label class="half" for="star2half"></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label class="full" for="star2"></label>
                                    <input type="radio" id="star1half" name="rating" value="1 and a half">
                                    <label class="half" for="star1half"></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label class="full" for="star1"></label>
                                    <input type="radio" id="starhalf" name="rating" value="half">
                                    <label class="half" for="starhalf"></label>
                                  </fieldset>
                                </div>
                                <div class="clear"></div>
                              </div>
                            </div>
                            <div class="input-group mg-b-15 mg-t-15">
                              <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" placeholder="User Name">
                            </div>
                            <div class="input-group mg-b-15">
                              <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="input-group mg-b-15">
                              <span class="input-group-addon"><i class="icon nalika-mail" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group review-pro-edt mg-b-0-pt">
                              <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Submit
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>
