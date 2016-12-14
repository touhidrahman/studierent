    <h3><?= __('Reports') ?></h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('landlordlink') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
            <tr>
                <td><?= $this->Number->format($report->id) ?></td>
                <td><?= $report->has('user') ? $this->Html->link($report->user->first_name . ' '. $report->user->last_name, ['controller' => 'Users', 'action' => 'view', $report->user->id]) : '' ?></td>
                <td><?= $report->has('property') ? $this->Html->link($report->property->title, ['controller' => 'Properties', 'action' => 'view', $report->property->id]) : '' ?></td>
                <td><?= h($report->landlordlink) ?></td>
                <td><?= h($report->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'viewReport', $report->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-xs-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('<')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('>') . ' >') ?>
        </ul>
        <p class="text-xs-center"><?= $this->Paginator->counter() ?></p>
    </div>
