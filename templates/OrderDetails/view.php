<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderDetail $orderDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order Detail'), ['action' => 'edit', $orderDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order Detail'), ['action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Order Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderDetails view content">
            <h3><?= h($orderDetail->created_by) ?></h3>
            <table>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($orderDetail->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($orderDetail->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $orderDetail->has('product') ? $this->Html->link($orderDetail->product->name, ['controller' => 'Products', 'action' => 'view', $orderDetail->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->address, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($orderDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($orderDetail->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($orderDetail->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($orderDetail->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($orderDetail->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $orderDetail->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
