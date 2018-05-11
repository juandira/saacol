<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cleaning[]|\Cake\Collection\CollectionInterface $cleanings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cleaning'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assets'), ['controller' => 'Assets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asset'), ['controller' => 'Assets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cleanings index large-9 medium-8 columns content">
    <h3><?= __('Cleanings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asset_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cleanings as $cleaning): ?>
            <tr>
                <td><?= $this->Number->format($cleaning->id) ?></td>
                <td><?= h($cleaning->date) ?></td>
                <td><?= h($cleaning->observation) ?></td>
                <td><?= h($cleaning->user) ?></td>
                <td><?= $cleaning->has('asset') ? $this->Html->link($cleaning->asset->name, ['controller' => 'Assets', 'action' => 'view', $cleaning->asset->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cleaning->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cleaning->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cleaning->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cleaning->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
