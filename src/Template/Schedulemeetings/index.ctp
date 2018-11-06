<?php
/**
  * @var \App\View\AppView $this
  */
?>
<style>
td, th {
    padding: 10px !important;
}
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Request a walk through'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Schedule Meetings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
				<th scope="col">Meeting Id</th>
                <th scope="col">Name</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Participants</th>
				<th scope="col">Link</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meetings as $meeting): ?>
            <tr>
                <td><?= $meeting->meeting_id ?></td>
                <td><?= $meeting->meeting_name ?></td>
                <td><?= $meeting->meeting_start ?></td>
                <td><?= $meeting->meeting_end ?></td>
                <td><?= implode(',', $meeting->participants); ?></td>
                <td><?= $meeting->viewerlink ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->meeting_id)]) ?>
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
