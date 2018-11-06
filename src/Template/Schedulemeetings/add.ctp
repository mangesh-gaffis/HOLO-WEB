<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Meetings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($schedulemeeting) ?>
    <fieldset>
        <legend><?= __('Schedule New Meeting') ?></legend>
        <?php
            echo $this->Form->control('meetingName');
            echo $this->Form->control('meetingStart');
            echo $this->Form->control('meetingEnd');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
