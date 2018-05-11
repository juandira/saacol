<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cleaning $cleaning
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cleaning'), ['action' => 'edit', $cleaning->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cleaning'), ['action' => 'delete', $cleaning->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cleaning->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cleanings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cleaning'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assets'), ['controller' => 'Assets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Asset'), ['controller' => 'Assets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cleanings view large-9 medium-8 columns content">
    <h3><?= h($cleaning->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Observation') ?></th>
            <td><?= h($cleaning->observation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($cleaning->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asset') ?></th>
            <td><?= $cleaning->has('asset') ? $this->Html->link($cleaning->asset->name, ['controller' => 'Assets', 'action' => 'view', $cleaning->asset->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cleaning->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($cleaning->date) ?></td>
        </tr>
    </table>
</div>
