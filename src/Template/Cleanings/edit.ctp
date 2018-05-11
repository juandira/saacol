<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cleaning $cleaning
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cleaning->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cleaning->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cleanings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assets'), ['controller' => 'Assets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asset'), ['controller' => 'Assets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cleanings form large-9 medium-8 columns content">
    <?= $this->Form->create($cleaning) ?>
    <fieldset>
        <legend><?= __('Edit Cleaning') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('observation');
            echo $this->Form->control('user');
            echo $this->Form->control('asset_id', ['options' => $assets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
