<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />

   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <title>Purchase History | shopWay eXpress</title>
   <link rel="icon" href="resources/logo.png" />

   <link rel="stylesheet" href="style.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
   <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
   <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

</head>

<body>
   <div class="container-fluid">
      <div class="row">
         <?php include "header.php";

         if (isset($_SESSION["u"])) {

            require "connection.php";

            $umail = $_SESSION["u"]["email"];

            $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $umail . "'");
            $invoice_num = $invoice_rs->num_rows;

         ?>

            <div class="col-12 text-center mb-3">
               <span class="fs-1 text-black fw-bold">Purchase History</span>
            </div>

            <?php

            if ($invoice_num == 0) {

            ?>
               <div class="col-12 bg-body text-center" style="height: 500px;">
                  <span class=" fs-1 fw-bolder text-black-50 d-block" style="margin-top:200px ;">You Have Not Purchase Any Product Yet.</span>
               </div>
            <?php

            } else {



            ?>

               <div class="col-11 ms-3 mb-3 form-check">
                  <input type="checkbox" class="form-check-input fs-5" id="del"/>
                  <span class="fs-5 fw-bold" style="cursor: pointer; color: red;" onclick="removeAll();">Delete All Records</span>
               </div>

               <div class="col-12">
                  <div class="row">
                     <div class="col-12 d-none d-lg-block">
                        <div class="row">

                           <div class="col-1 text-center bg-primary">
                              <label class="form-label fw-bold">#</label>
                           </div>
                           <div class="col-3 text-center bg-primary">
                              <label class="form-label fw-bold">Order Details</label>
                           </div>
                           <div class="col-1 text-center bg-primary text-end">
                              <label class="form-label fw-bold">Qty</label>
                           </div>
                           <div class="col-2 text-center bg-primary text-end">
                              <label class="form-label fw-bold">Amount</label>
                           </div>
                           <div class="col-2 text-center bg-primary text-end">
                              <label class="form-label fw-bold">Purchase Date & Time</label>
                           </div>
                           <div class="col-3 bg-primary"></div>

                           <div class="col-12">
                              <hr />
                           </div>
                        </div>
                     </div>

                     <?php

                     for ($x = 0; $x < $invoice_num; $x++) {

                        $invoice_data = $invoice_rs->fetch_assoc();

                        $product_rs = Database::search("SELECT * FROM `product` WHERE `product_id`='" . $invoice_data["product_product_id"] . "'");
                        $product_data = $product_rs->fetch_assoc();

                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                        $user_data = $user_rs->fetch_assoc();


                     ?>

                        <div class="col-12">
                           <div class="row">
                              <div class="col-12 col-lg-1 text-center text-center">
                                 <label class="form-label text-black  fs-5 py-5"><?php echo $invoice_data["id"]; ?></label>
                              </div>
                              <div class="col-12 col-lg-3">
                                 <div class="card mx-0 mx-lg-3 my-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                       <div class="col-md-4">
                                          <?php

                                          $img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $invoice_data["product_product_id"] . "'");

                                          $img_data = $img_rs->fetch_assoc();

                                          ?>
                                          <img src="<?php echo $img_data["product_image_path"]; ?>" class="img-fluid rounded-start" />
                                       </div>
                                       <div class="col-md-8">
                                          <div class="card-body">
                                             <div class="card-title"><?php echo $product_data["title"]; ?></div>
                                             <div class="card-text"><b>Seller : </b><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></div>
                                             <div class="card-text"><b>Price : </b>Rs . <?php echo $product_data["price"]; ?>.00</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-lg-1 text-center">
                                 <label class="form-label fs-5 text-black py-5"><?php echo $invoice_data["qty"]; ?></label>
                              </div>
                              <div class="col-12 col-lg-2 text-center">
                                 <label class="form-label text-black fs-5 py-5">Rs . <?php echo $invoice_data["total"]; ?>.00</label>
                              </div>
                              <div class="col-12 col-lg-2 text-center">
                                 <label class="form-label text-black fs-5 py-5 px-3"><?php echo $invoice_data["date"]; ?></label>
                              </div>
                              <div class="col-12 col-lg-3">
                                 <div class="row d-flex justify-content-center">
                                    <div class="col-6 d-grid">
                                       <button class="btn btn-danger fs-5 rounded mt-5" onclick="deleHistory(<?php echo $invoice_data['id']; ?>);"><i class="bi bi-trash3-fill"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php

                     }

                     ?>

                     <div class="col-12">
                        <hr />
                     </div>

                  </div>
               </div>

            <?php

            }
         } else {
            ?>
            <!-- WithOut Items -->

            <script>
               window.location = "index.php";
            </script>

            <!-- WithOut Items -->
         <?php
         }
         include "footer.php";
         ?>
      </div>
   </div>
</body>

<script src="script.js"></script>

</html>