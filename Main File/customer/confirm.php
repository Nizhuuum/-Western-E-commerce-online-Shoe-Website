<?php

session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";


} else {

    include("includes/db.php");
    include("includes/header.php");
    include("functions/functions.php");
    include("includes/main.php");


if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];

}

    $my_amount = $_GET['my_amount'];
    $my_invoice_no = $_GET['my_invoice_no'];
    ?>


    <div id="content" style="margin: auto;width: 50%"><!-- content Starts -->

            <div class="col-md-9" style="margin: auto;width: 50%"><!-- col-md-9 Starts -->

                <div class="box"><!-- box Starts -->

                    <h1 align="center"> Please Confirm Your Payment </h1>


                    <form action="confirm.php?update_id=<?php echo $order_id; ?>&my_amount=<?php echo $my_amount; ?>&my_invoice_no=<?php echo $my_invoice_no; ?>" method="post"
                          enctype="multipart/form-data"><!--- form Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label>Invoice No:</label>

                            <input type="text" class="form-control" name="invoice_no" value="<?php echo $my_invoice_no; ?>" required disabled>

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label>Amount Sent:</label>

                            <input type="text" class="form-control" name="amount_sent" value="<?php echo $my_amount; ?>" required disabled>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label>Select Payment Mode:</label>

                            <select name="payment_mode" class="form-control" required><!-- select Starts -->

                                <option disabled>Select Payment Mode</option>
                                <option value="Bkash">bKash</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Rocket">Dutch-Bangla Bank</option>

                            </select><!-- select Ends -->

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label>Transaction Id:</label>

                            <input type="text" class="form-control" name="ref_no" required>

                        </div><!-- form-group Ends -->


                        <div class="text-center"><!-- text-center Starts -->

                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">

                                <i class="fa fa-user-md"></i> Confirm Payment

                            </button>

                        </div><!-- text-center Ends -->

                    </form><!--- form Ends -->

                    <?php

                    if (isset($_POST['confirm_payment'])) {

                        $update_id = $_GET['update_id'];

                        $invoice_no = $_GET['my_invoice_no'];

                        $amount = $_GET['my_amount'];

                        $payment_mode = $_POST['payment_mode'];

                        $ref_no = $_POST['ref_no'];

                        date_default_timezone_set("Asia/Dhaka");
                        $payment_date = date("d-m-Y_h:i:sa");

                        $complete = "Complete";

                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$payment_date')";

                        $run_payment = mysqli_query($con, $insert_payment);

                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                        $run_customer_order = mysqli_query($con, $update_customer_order);

                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                        $run_pending_order = mysqli_query($con, $update_pending_order);

                        if ($run_pending_order) {

                            echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

                            echo "<script>window.open('my_orders.php','_self')</script>";

                        }


                    }


                    ?>


                </div><!-- box Ends -->

            </div><!-- col-md-9 Ends -->

        </div><!-- container Ends -->
    </div><!-- content Ends -->


    <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    </body>
    </html>

<?php } ?>
