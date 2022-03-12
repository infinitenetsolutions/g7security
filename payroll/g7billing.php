<?php
include 'db.php';
$sel_result= mysqli_fetch_assoc(mysqli_query($conn,"select * from company_bill where id='".$_GET['b_no']."'"));
$sel_comp = mysqli_fetch_assoc(mysqli_query($conn,"select cb.*,c.company_address,c.area,c.company_name,c.gstin from company_billing cb left join company c on cb.company = c.id where cb.bill_no = '".$_GET['b_no']."'"));
$gst_type = substr($sel_comp['gstin'], 0, 2);

function convert_number_to_words($number)
{
    $no = round($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
        '60' => 'Sixty', '70' => 'Seventy',
        '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
        "." . $words[$point / 10] . " " .
        $words[$point = $point % 10] : '';

    if($point!= 0)
    {
        echo $result . "Rupees  " . $points . " Paise";
    }
    else {
        echo $result . "Rupees  ";
    }
}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Billing</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
    table-responsive,td,th{
text-align: center
}
    </style>
  </head>

  <body class="nav-md">

    <div class="container body">

      <div class="main_container">
        
            <!-- /sidebar menu -->
             <?php include("sidebar.php");?>
            <!-- /menu footer buttons -->
            
        <!-- top navigation -->
        <!-- /topbar menu -->
        <?php include("topbar.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Invoice<small></small></h2>
                    
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <img src="images/logo.png" style="width: 60px;height: 40px;">

                                          <center><img src="images/sun.jpg" style="width: 60px;height: 60px;"><br><h3>GSEVEN INDUSTRIAL SECURITY AGENCY PVT. LTD.</h3><h4>JAMSHEDPUR,HEAD OFFICE</h4><h5>H NO.477,Road No.-1,Tripurari Colony,Adityapur-1,Jamshedpur-831013</h5><h5>E_mail:g7security@gmail.com Phone no:9835196337,8987572395</h5></center>
                                          
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row">
                          <div class="col-sm-12">

                      	  <div class="col-sm-6">
                         
                          <address>
                                          <strong>Bill No:</strong>
                                          <?php echo $sel_result['billing_no']; ?><br>
                              <strong>GSTIN NO:</strong>
                              20AAF CG2593QI Z A<br>
                              <strong>PAN No:</strong>
                              AAFCG 2593Q<br>
                                      </address>
                        </div>
                      
                     
                        <div class="col-sm-6">
                         
                          <address>
                                          <strong>Bill Date:</strong>
                                         <?php echo date("d F Y", strtotime($sel_result['inserted_date']));?><br>
                              <strong>Bill Month:</strong>
                              <?php echo  date("F Y", strtotime($sel_result['month']));?><br>
                              <strong>P.F. No:</strong>
                              IH/JP/14413<br>

                                      </address>
                        </div>
                         </div>
                      </div>
                  
                      </div>
                      <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                         
                          <address>
                                          <strong>Customer Name & Address:</strong>
                                          <?php echo $sel_comp['company_name'];?><br>
                                          <?php echo $sel_comp['company_address'];?><br>
                                          <?php echo $sel_comp['area'];?><br>

										GSTIN No <?php echo $sel_comp['gstin'];?><br>
                                      </address>
                        </div>
                      
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table-responsive" border="2" width="1000px">
        <thead>
          <tr>
            <th width="50px;">SL no</th>
            <th width="300px;">Description</th>
            <th width="100px;">Days</th>
            <th width="150px;">Rate</th>
            <th width="200px;">Amount</th>
          </tr>
        </thead>
        <tbody>
      <?php
      $sel_data = mysqli_query($conn, "select cb.*, d.designation as d_name from company_billing cb left join designation d on cb.designation = d.id where cb.bill_no='".$_GET['b_no']."'");
//var_dump("select cb.*, d.designation as d_name from company_billing left join designation d on cb.designation = d.in where cb.bill_no='".$_GET['b_no']."'");
        $count = 1;
          while($data = mysqli_fetch_assoc($sel_data))
          {
              $sum += $data['amount']; ?>

<tr style="border-top: transparent; border-bottom: transparent;">
    <td><?php echo $count;?></td>
    <td><?php echo $data['no_of_emp'];?> <?php echo $data['d_name'];?></td>
    <td><?php echo $data['no_of_days'];?></td>
    <td><?php echo $data['rate'];?></td>
    <td><?php echo $data['amount'];?></td>


          </tr>
          <?php $count++;
          } ?>


          <tr style="border-top: transparent;">
            <td></td>
            <td>RTGS/NEFT IFS CODE<br>
PUNB0289400<br>
A/C NO 289400870000 1 748<br>
<strong>Service Accounting Codes</strong><br>
1. Gruard Services998525</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
           <tr>
            <td colspan="4" style="text-align: right; font-weight: 700"">Total </td>
            <td style="font-weight: 700"><?php echo number_format($sum,2,'.', '' );?></td>
          </tr>

          <?php
          $cgst_ = $sum * 0.09;
          $sgst_ = $sum * 0.09;
          $igst_ = $sum * 0.18;
          $cgst = number_format($cgst_,2,'.', '');
          $sgst = number_format($sgst_,2,'.', '');
          $igst = number_format($igst_,2,'.', '');
          $net = number_format(($sum+$sgst+$cgst),2,'.', '');
          $net_ = number_format(($sum+$igst),2, '.', '');
          if($gst_type == '20')
          {

          ?>
           <tr>
            <td colspan="4" style="text-align: right; font-weight: 700">CGST @ 9%</td>
            <td style="font-weight: 700"><?php echo $cgst;?></td>
          </tr>
           <tr>
            <td colspan="4" style="text-align: right; font-weight: 700">SGST @ 9%</td>
               <td style="font-weight: 700"><?php echo $sgst;?></td>
          </tr>
              <tr>
                  <td colspan="4" style="text-align: left; font-weight: 700">Grand Total Rs.:
                      <?php echo convert_number_to_words($sum+$cgst_+$sgst); ?> Only. </td>

                  <td style="font-weight: 700"><?php echo $net;?></td>
              </tr>
          <?php } else { ?>
           <tr>
            <td colspan="4" style="text-align: right; font-weight: 700">IGST @ 18%</td>
               <td style="font-weight: 700"><?php echo $igst;?></td>
          </tr>
              <tr>
                  <td colspan="4" style="text-align: left; font-weight: 700">Grand Total Rs.:
                      <?php echo convert_number_to_words($net_); ?> Only. </td>
                  <td style="font-weight: 700"><?php echo $net_;?></td>
              </tr>
                              <?php } ?>





        </tfoot>
      </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-12">
                          <p class="lead">Interest @24% will be charges if not paid within 7 days of presentation</p>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                    <a href="billprint.php?b_no=<?php echo $_GET['b_no'];?>&company=<?php echo $sel_comp['company'];?>&month=<?php echo $sel_comp['month'];?>" target="_blank"><button class="btn btn-default"><i class="fa fa-print"></i> Print</button></a>

                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>