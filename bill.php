<?php include_once ('system/main.php');?>
<?php date_default_timezone_set('Asia/Colombo');?>
<?php 
	if($_REQUEST['id']){
		$id = $_REQUEST['id'];

	} else {
		$id = $_SESSION['ORDER_ID'];
	}
?>


<style type="text/css" media="print">
	body { padding: 0; margin: 0; font-size:400px;}
	.table	{ padding: 0; margin: 0;}
	.table td , th{ padding: 10px; font-family: verdana; font-size:14px; text-transform: capitalize;}
	.table th	{ font-size: 10px;}
	.td_border	{ border-bottom: 1px solid graytext;}
	.border-top	{ border-top:1px solid graytext;}
	.warranty	{ font-size:12px;}
	div	{ padding: 4px; font-size:11px; font-family: verdana; width:300px;}
</style>

<style type="text/css" media="screen">
	body { padding: 0; margin: 0;  font-size:400px; font-family: }
	.table	{ padding: 0; margin: 0;}
	.table td , th{ padding: 10px; font-family: verdana; font-size:20px; text-transform: capitalize;}
	.table th	{ font-size: 10px;}
	.td_border	{ border-bottom: 1px solid graytext;}
	.border-top	{ border-top:1px solid graytext;}
	.warranty	{ font-size:12px;}
	div	{ padding: 4px; font-size:11px; font-family: verdana; width:375px;}
</style>
<body>
<table border="0" cellpadding="0" cellspacing="0" class="table" style="width:300px;">
		<tr>
		  <td colspan="5" style="text-align:center;"><img src="images/roja.png" style="text-align: center;" /> <br /> <img src="images/roja1.png" style="text-align: center;" /> <br />No 51, Olcott Mawatha, Galle.<br />Sri Lanka.<br />077 784 5988</td>
  		</tr>
  		
		<tr>
		  <td colspan="3" style="text-align:left;">CASHIER: <?php echo $_SESSION['SLOGINUSER'];?></td>
		  <td colspan="2" style="text-align:right;"><?php echo "R-" . str_pad($id,6, "0" ,STR_PAD_LEFT);?></td>
  		</tr>
  		<tr>
		  <td colspan="3" style="text-align:left;">CUSTOMER: <?php echo $fw->orders()->getorderById($id)->customer_name;?></td>
  		</tr>
  		

  		
  	<?php $NOFITEMS = sizeof($fw->orders()->itemsByOrderId($id));?>	
	<?php foreach($fw->orders()->itemsByOrderId($id) as $p){?>
		<tr>
			<td style="text-align:right;"><?php echo ($p['item_code']=="")? $p['id']: $p['item_code'];?></td>
			<td style="text-align:right;"><?php echo $p['product_name'];?></td>
			<td style="text-align:right;"><?php echo number_format($p['item_price'],2,'.','');?></td>
			<td style="text-align:right;"><?php echo $p['quntity'];?></td>
			<td style="text-align:right;"><?php echo number_format($p['quntity'] * $p['item_price'],2,'.','');?></td>
		</tr>
	<?php }?>
	<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>TOTAL</td>
			<td class="td_border border-top" style="text-align:right;"><?php echo number_format($fw->orders()->getordersById($id)->total_amount,2,'.','');?></td>
	</tr>
	<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>CASH</td>
			<td class="td_border" style="text-align:right;"><?php echo number_format($fw->orders()->getordersById($id)->total_payment,2,'.','');?></td>
	</tr>
	<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>BALANCE</td>
			<td class="td_border" style="text-align:right;">
				
			<?php  $dues = $_SESSION['dues'];?>
			<?php  $paymentdue = $_SESSION['payment'];  ?>

			<?php   if ($dues <  $paymentdue) {
						echo (($dues -$paymentdue) -($dues -$paymentdue) -($dues -$paymentdue)  );
						} 
					else
					{?>
						<?php echo (number_format($fw->orders()->getordersById($id)->total_due,2,'.','')=='0.00') ? number_format($fw->orders()->getordersById($id)->total_payment - $fw->orders()->getordersById($id)->total_amount,2,'.','') : number_format($fw->orders()->getordersById($id)->total_payment - $fw->orders()->getordersById($id)->total_amount,2,'.','');
			}?>
			
			</td>
	</tr>
	<tr>
			<td>Q(<?php echo $NOFITEMS;?>)</td>
			<td colspan="2"><?php echo date('Y-m-d');?></td>
			<td colspan="2"><?php echo date('h:i:s A');?></td>
	</tr>
	<!-- Wrranty -->
	<tr>
	  <td colspan="5" class="warranty">
		
	  	<?php foreach($fw->orders()->notById($id) as $k){?>
			<?php if($k['note']!=""){?>
			<h5>Warranty</h5>
				<p><b><?php echo $k['product_name'];?></b> :  <?php echo nl2br($k['note']);?></p>
			<?php }?>
		<?php }?>      </td>
  </tr>
  
 
 <?php if (($fw->orders()->getduesById($id)->total_duee) < 0 ){?>

 <tr><td colspan="3" style="text-align:left;">Total Due:<?php echo $fw->orders()->getduesById($id)->total_duee;?></td></tr>	  	
 
 <?php }?> 
  
	<tr>
			<td colspan="5">
			<table width="100%" border="0" cellpadding="6" cellspacing="6">
              <tr>
                <td align="center" style="font-size:18px;">System By LionWeb.lk 0913098677</td>
              </tr>
            </table></td>
	</tr>
</table>
<div class="footer"></div>
<style type="text/css" media="print">
    .footer 	{ display: block; page-break-before: always; }
</style>
</body>