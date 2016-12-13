<div class="col-sm-3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Mark As Resolved'), ['action' => 'resolve', $report->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Report'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete report # {0}?', $report->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="col-sm-9">
    <h3>Report ID: <?= h($report->id) ?></h3>
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $report->has('user') ? $this->Html->link($report->user->username, ['controller' => 'Users', 'action' => 'view', $report->user->id], ['target' => '_blank']) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $report->has('property') ? $this->Html->link($report->property->title, ['controller' => 'Properties', 'action' => 'view', $report->property->id], ['target' => '_blank']) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preferred Email of Reporter') ?></th>
            <td><?= h($report->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relation to Landlord') ?></th>
            <td><?= h($report->landlordlink) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= ($report->status == 1)? 'Unresolved' : 'Resolved' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $this->Text->autoParagraph(h($report->message)); ?></td>
        </tr>

    </table>
</div>
