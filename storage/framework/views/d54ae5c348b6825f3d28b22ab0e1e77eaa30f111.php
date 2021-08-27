<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice</title>

    <style>
        body {
            background: #fff none;
            font-family: DejaVu Sans, 'sans-serif';
            font-size: 12px;
        }

        h2 {
            font-size: 28px;
            color: #ccc;
        }

        .container {
            padding-top: 30px;
        }

        .invoice-head td {
            padding: 0 8px;
        }

        .table th {
            vertical-align: bottom;
            font-weight: bold;
            padding: 8px;
            line-height: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tr.row td {
            border-bottom: 1px solid #ddd;
        }

        .table td {
            padding: 8px;
            line-height: 14px;
            text-align: left;
            vertical-align: top;
        }
    </style>
</head>
<body>

<div class="container">
    <table style="margin-left: auto; margin-right: auto;" width="550">
        <tr>
            <td width="160">
                &nbsp;
            </td>

            <!-- Account Name / Header Image -->
            <td align="right">
                <strong><?php echo e($header ?? $vendor ?? $invoice->account_name); ?></strong>
            </td>
        </tr>
        <tr valign="top">
            <td style="font-size:9px;">
                <span style="font-size: 28px; color: #ccc;">
                    Receipt
                </span><br><br>

                <!-- Account Details -->
                <?php echo e($vendor ?? $invoice->account_name); ?><br>

                <?php if(isset($street)): ?>
                    <?php echo e($street); ?><br>
                <?php endif; ?>

                <?php if(isset($location)): ?>
                    <?php echo e($location); ?><br>
                <?php endif; ?>

                <?php if(isset($phone)): ?>
                    <?php echo e($phone); ?><br>
                <?php endif; ?>

                <?php if(isset($email)): ?>
                    <?php echo e($email); ?><br>
                <?php endif; ?>

                <?php if(isset($url)): ?>
                    <a href="<?php echo e($url); ?>"><?php echo e($url); ?></a><br>
                <?php endif; ?>

                <?php if(isset($vendorVat)): ?>
                    <?php echo e($vendorVat); ?><br>
                <?php else: ?>
                    <?php $__currentLoopData = $invoice->accountTaxIds(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($taxId->value); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <br><br>

                <!-- Customer Details -->
                <strong>Bill to:</strong><br>

                <?php echo e($invoice->customer_name ?? $invoice->customer_email); ?><br>

                <?php if($address = $invoice->customer_address): ?>
                    <?php if($address->line1): ?>
                        <?php echo e($address->line1); ?><br>
                    <?php endif; ?>

                    <?php if($address->line2): ?>
                        <?php echo e($address->line2); ?><br>
                    <?php endif; ?>

                    <?php if($address->city): ?>
                        <?php echo e($address->city); ?><br>
                    <?php endif; ?>

                    <?php if($address->state || $address->postal_code): ?>
                        <?php echo e(implode(' ', [$address->state, $address->postal_code])); ?><br>
                    <?php endif; ?>

                    <?php if($address->country): ?>
                        <?php echo e($address->country); ?><br>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if($invoice->customer_phone): ?>
                    <?php echo e($invoice->customer_phone); ?><br>
                <?php endif; ?>

                <?php if($invoice->customer_name): ?>
                    <?php echo e($invoice->customer_email); ?><br>
                <?php endif; ?>

                <?php $__currentLoopData = $invoice->customerTaxIds(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($taxId->value); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <!-- Invoice Info -->
                <p>
                    <?php if(isset($product)): ?>
                        <strong>Product:</strong> <?php echo e($product); ?><br>
                    <?php endif; ?>

                    <strong>Date:</strong> <?php echo e($invoice->date()->toFormattedDateString()); ?><br>

                    <?php if($dueDate = $invoice->dueDate()): ?>
                        <strong>Due date:</strong> <?php echo e($dueDate->toFormattedDateString()); ?><br>
                    <?php endif; ?>

                    <strong>Invoice Number:</strong> <?php echo e($id ?? $invoice->number); ?><br>
                </p>

                <!-- Memo / Description -->
                <?php if($invoice->description): ?>
                    <p>
                        <?php echo e($invoice->description); ?>

                    </p>
                <?php endif; ?>

                <!-- Extra / VAT Information -->
                <?php if(isset($vat)): ?>
                    <p>
                        <?php echo e($vat); ?>

                    </p>
                <?php endif; ?>

                <br><br>

                <!-- Invoice Table -->
                <table width="100%" class="table" border="0">
                    <tr>
                        <th align="left">Description</th>
                        <th align="right">Date</th>

                        <?php if($invoice->hasTax()): ?>
                            <th align="right">Tax</th>
                        <?php endif; ?>

                        <th align="right">Amount</th>
                    </tr>

                    <!-- Display The Invoice Items -->
                    <?php $__currentLoopData = $invoice->invoiceItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row">
                            <td colspan="2"><?php echo e($item->description); ?></td>

                            <?php if($invoice->hasTax()): ?>
                                <td>
                                    <?php if($inclusiveTaxPercentage = $item->inclusiveTaxPercentage()): ?>
                                        <?php echo e($inclusiveTaxPercentage); ?>% incl.
                                    <?php endif; ?>

                                    <?php if($item->hasBothInclusiveAndExclusiveTax()): ?>
                                        +
                                    <?php endif; ?>

                                    <?php if($exclusiveTaxPercentage = $item->exclusiveTaxPercentage()): ?>
                                        <?php echo e($exclusiveTaxPercentage); ?>%
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>

                            <td><?php echo e($item->total()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Display The Subscriptions -->
                    <?php $__currentLoopData = $invoice->subscriptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row">
                            <td><?php echo e($subscription->description); ?></td>
                            <td>
                                <?php echo e($subscription->startDateAsCarbon()->formatLocalized('%B %e, %Y')); ?> -
                                <?php echo e($subscription->endDateAsCarbon()->formatLocalized('%B %e, %Y')); ?>

                            </td>

                            <?php if($invoice->hasTax()): ?>
                                <td>
                                    <?php if($inclusiveTaxPercentage = $subscription->inclusiveTaxPercentage()): ?>
                                        <?php echo e($inclusiveTaxPercentage); ?>% incl.
                                    <?php endif; ?>

                                    <?php if($subscription->hasBothInclusiveAndExclusiveTax()): ?>
                                        +
                                    <?php endif; ?>

                                    <?php if($exclusiveTaxPercentage = $subscription->exclusiveTaxPercentage()): ?>
                                        <?php echo e($exclusiveTaxPercentage); ?>%
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>

                            <td><?php echo e($subscription->total()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Display The Subtotal -->
                    <?php if($invoice->hasDiscount() || $invoice->hasTax() || $invoice->hasStartingBalance()): ?>
                        <tr>
                            <td colspan="<?php echo e($invoice->hasTax() ? 3 : 2); ?>" style="text-align: right;">Subtotal</td>
                            <td><?php echo e($invoice->subtotal()); ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- Display The Discount -->
                    <?php if($invoice->hasDiscount()): ?>
                        <?php $__currentLoopData = $invoice->discounts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ($coupon = $discount->coupon()); ?>

                            <tr>
                                <td colspan="<?php echo e($invoice->hasTax() ? 3 : 2); ?>" style="text-align: right;">
                                    <?php if($coupon->isPercentage()): ?>
                                        <?php echo e($coupon->name()); ?> (<?php echo e($coupon->percentOff()); ?>% Off)
                                    <?php else: ?>
                                        <?php echo e($coupon->name()); ?> (<?php echo e($coupon->amountOff()); ?> Off)
                                    <?php endif; ?>
                                </td>

                                <td>-<?php echo e($invoice->discountFor($discount)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <!-- Display The Taxes -->
                    <?php if (! ($invoice->isNotTaxExempt())): ?>
                        <tr>
                            <td colspan="<?php echo e($invoice->hasTax() ? 3 : 2); ?>" style="text-align: right;">
                                <?php if($invoice->isTaxExempt()): ?>
                                    Tax is exempted
                                <?php else: ?>
                                    Tax to be paid on reverse charge basis
                                <?php endif; ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php else: ?>
                        <?php $__currentLoopData = $invoice->taxes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="3" style="text-align: right;">
                                    <?php echo e($tax->display_name); ?> <?php echo e($tax->jurisdiction ? ' - '.$tax->jurisdiction : ''); ?>

                                    (<?php echo e($tax->percentage); ?>%<?php echo e($tax->isInclusive() ? ' incl.' : ''); ?>)
                                </td>
                                <td><?php echo e($tax->amount()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <!-- Starting Balance -->
                    <?php if($invoice->hasStartingBalance()): ?>
                        <tr>
                            <td colspan="<?php echo e($invoice->hasTax() ? 3 : 2); ?>" style="text-align: right;">
                                Customer Balance
                            </td>
                            <td><?php echo e($invoice->startingBalance()); ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- Display The Final Total -->
                    <tr>
                        <td colspan="<?php echo e($invoice->hasTax() ? 3 : 2); ?>" style="text-align: right;">
                            <strong>Total</strong>
                        </td>
                        <td>
                            <strong><?php echo e($invoice->total()); ?></strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
<?php /**PATH /media/amr/Drive/Training/RMZ/vendor/laravel/cashier/resources/views/receipt.blade.php ENDPATH**/ ?>