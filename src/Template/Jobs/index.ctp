<!-- File: src/Template/Jobs/index.ctp -->

<h1>Jobbörse</h1>
<p><?= $this->Html->link("Artikel hinzufügen", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Titel des Stellenangebots</th>
        <th>Datum der Veröffentlichung</th>
        <th>Arbeitgeber</th>
        <th>Arbeitsort</th>
        <th>Beginn</th>
        <th>Aktionen</th>
    </tr>


    <?php foreach ($jobs as $job): ?>
    <tr>
        <td>
            <?= $this->Html->link($job->jobname, ['action' => 'view', $job->id]) ?>
        </td>
        <td>
            <?= $job->created->format('d.m.Y') ?>
        </td>
        <td>
            <?= $job->employer ?>
        </td>
        <td>
            <?= $job->joblocation ?>
        </td>
        <td>
            <?= $job->start ?>
        </td>
        <td>
            <?= $this->Html->link("Details", ['action' => 'view', $job->id]); ?>
        </td>

    </tr>
    <?php endforeach; ?>
</table>