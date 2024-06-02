<?php
include "../signup/connect.php";
require_once '../signup/auth.php';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Profile </title>
    <link rel="stylesheet" href="profile.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <main>
      <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
        <div class="card overflow-hidden">
          <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
              <div class="list-group list-group-flush account-settings-links">
                <a
                  class="list-group-item list-group-item-action active"
                  data-toggle="list"
                  href="#account-general"
                  >General</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#account-change-password"
                  >Change password</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#account-info"
                  >Info</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#Orders-history"
                  >Orders history</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#account-notifications"
                  >Notifications</a
                >
              </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="account-general">
                  <div class="card-body media align-items-center">
                    <img
                      src="https://bootdey.com/img/Content/avatar/avatar1.png"
                      alt
                      class="d-block ui-w-80"
                    />
                    <div class="media-body ml-4">
                      <label class="btn btn-outline-primary">
                        Upload new photo
                        <input type="file" class="account-settings-fileinput" />
                      </label>
                      &nbsp;
                      <button type="button" class="btn btn-default md-btn-flat">
                        Reset
                      </button>
                      <div class="text-light small mt-1">
                        Allowed JPG, GIF or PNG. Max size of 800K
                      </div>
                    </div>
                  </div>
                  <hr class="border-light m-0" />
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">Username</label>
                      <input
                        type="text"
                        class="form-control mb-1"
                        placeholder="nmaxwell"
                      />
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label">First Name</label>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Simon"
                        />
                      </div>
                      <div class="col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Khalil"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input
                        type="text"
                        class="form-control mb-1"
                        placeholder="simon.khalil@isae.edu.lb"
                      />
                      <div class="alert alert-warning mt-3">
                        Your email is not confirmed. Please check your inbox.<br />
                        <a href="javascript:void(0)">Resend confirmation</a>
                      </div>
                    </div>
                    <div>
                      <section id="order-tracking">
                        <h1>Track My Order</h1>
                        <p>
                          Enter your order ID to track the status of your order.
                        </p>
                        <input
                          type="text"
                          id="order-id"
                          placeholder="Enter your order ID"
                        />
                        <button id="track-btn">
                          Track Order<span class="arrow"></span>
                        </button>

                        <div id="order-details" class="hidden">
                          <h2>Order Details</h2>
                          <p>Order ID: <span id="order-id-display"></span></p>
                          <p>Status: <span id="order-status"></span></p>
                          <p>
                            Estimated Delivery Date:
                            <span id="delivery-date"></span>
                          </p>
                          <p>
                            Tracking Number: <span id="tracking-number"></span>
                          </p>
                          <p>
                            Shipping Carrier:
                            <span id="shipping-carrier"></span>
                          </p>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-change-password">
                  <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Current password</label>
                      <input type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label class="form-label">New password</label>
                      <input type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label class="form-label">Repeat new password</label>
                      <input type="password" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-info">
                  <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Adresse</label>
                      <textarea
                        class="form-control"
                        rows="5"
                        style="resize: none"
                      >
 Mount lebanon , sahel alma , next to jamil market.</textarea
                      >
                    </div>
                    <div class="form-group">
                      <label class="form-label">Street</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="next to jamil market"
                      />
                    </div>
                    <div class="form-group">
                      <label class="form-label">City</label>
                      <input type="text" class="form-control" placeholder="sahel alma" />
                    </div>
                    <div class="form-group">
                      <label class="form-label">Country</label>
                      <select class="custom-select">
                        <option>USA</option>
                        <option>Canada</option>
                        <option>UK</option>
                        <option>Germany</option>
                        <option>France</option>
                        <option selected>lebanon</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Postal Code</label>
                      <input type="text" class="form-control" placeholder="1200" />
                    </div>
                  </div>
                  <hr class="border-light m-0" />
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Contacts</h6>
                    <div class="form-group">
                      <label class="form-label">Phone</label>
                      <input
                        type="text"
                        class="form-control"
                        value="+961 81 381 666"
                      />
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="Orders-history">
                  <div class="card-body pb-2">
                    <div class="row">
                      <div class="col-md-6">
                        <h4>Orders</h4>
                        <table>
                          <tr>
                            <th>Order Date</th>
                            <th>Order Number</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Shipping</th>
                          </tr>
                          <tr>
                            <td>5/5/2024</td>
                            <td>1234567890</td>
                            <td>$350.50</td>
                            <td>Order Shipped</td>
                            <td>Track Shipping</td>
                          </tr>
                          <tr>
                            <td>4/5/2024</td>
                            <td>7546473756</td>
                            <td>$200.00</td>
                            <td>Order Shipped</td>
                            <td>Track Shipping</td>
                          </tr>
                          <tr>
                            <td>19/4/2022</td>
                            <td>0103554775</td>
                            <td>$750.00</td>
                            <td>Order Recived</td>
                            <td>--</td>
                          </tr>
                          <tr>
                            <td>15/11/2019</td>
                            <td>0016358936</td>
                            <td>$455.55</td>
                            <td>Order Recived</td>
                            <td>--</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <div class="order"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-notifications">
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Activity</h6>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Email me when products are back on stock.</span
                        >
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Email me when special products drops.</span
                        >
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Email me when products are on sale.</span
                        >
                      </label>
                    </div>
                  </div>
                  <hr class="border-light m-0" />
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Application</h6>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >News and announcements</span
                        >
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Weekly product updates</span
                        >
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-right mt-3">
          <button type="button" class="btn btn-primary">Save changes</button
          >&nbsp;
          <button type="button" class="btn btn-default">Cancel</button>
        </div>
      </div>
      <script src="profile.js"></script>
      <script
        data-cfasync="false"
        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
      ></script>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript"></script>
    </main>
  </body>
</html>
