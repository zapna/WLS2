<?php use_helper('I18N') ?>
<?php use_helper('Number') ?>
<?php if ($sf_user->hasFlash('message')): ?>
<div style="color:#FF0000">
 <?php echo __($sf_user->getFlash('message')) ?>
</div>
<?php endif; ?>
<?Php if($companyval!=''){?><div id="sf_admin_container">
	<div id="sf_admin_content">
            <a href="<?php echo url_for('employee/index').'?company_id='.$companyval."&filter=filter" ?>" class="external_link" target="_self"><?php echo __('Employees') ?></a>
            <a href="<?php echo url_for('company/usage').'?company_id='.$companyval; ?>" class="external_link" target="_self"><?php echo __('Usage') ?></a>
            <a href="<?php echo url_for('company/Paymenthistory').'?company_id='.$companyval.'&filter=filter' ?>" class="external_link" target="_self"><?php echo __('Payment History') ?></a>
        </div>
    </div>
<?php } ?>

<div id="sf_admin_container"><h1><?php echo __('Payment History') ?></h1></div>
<table width="75%" cellspacing="0" cellpadding="2" class="tblAlign">
<tr class="headings">
    <th><?php echo __('Date &amp; Time') ?></th>
    <th><?php echo __('Company &amp; Name') ?></th>
    <th><?php echo __('Description') ?></th>
    <th><?php echo __('Amount') ?></th>
</tr>
<?php 
$amount_total = 0;
$incrment=1;
foreach($transactions as $transaction):

if($incrment%2==0){
$colorvalue="#FFFFFF";
}else{

$colorvalue="#C9C7C7";
}
$incrment++;
?>
<tr  style="background-color:<?php echo $colorvalue;?>">
    <td><?php echo  $transaction->getCreatedAt() ?></td>
    <td><?php echo ($transaction->getCompany()?$transaction->getCompany():'N/A')?></td>
    <td><?php echo $transaction->getDescription() ?></td>
    <td><?php echo $transaction->getAmount(); $amount_total += $transaction->getAmount(); echo ('EURO'); ?></td>
</tr>
<?php endforeach; ?>
<?php if(count($transactions)==0): ?>
<tr>
    <td colspan="4"><p><?php echo __('There are currently no transactions to show.') ?></p></td>
</tr>
<?php else: ?>
<tr><td>&nbsp;</td>
    <td colspan="2" align="right"><strong><?php echo __('Total:') ?>&nbsp;&nbsp;</strong></td>
    <td><?php echo format_number($amount_total); echo ('EURO'); ?></td>
    
</tr>	
<?php endif; ?>
</table>
