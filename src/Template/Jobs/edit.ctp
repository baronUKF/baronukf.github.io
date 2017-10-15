<!-- File: src/Template/Jobs/edit.ctp -->

<h1>Job bearbeiten</h1>
<?php
	echo $this->Form->create($job);
    echo $this->Form->control('jobname',['label' => 'Titel des Stellenangebots']);
    echo $this->Form->control('email',['label' => 'E-Mail Adresse']);
    echo $this->Form->control('employer',['label' => 'Arbeitgeber']);
    echo $this->Form->control('joblocation',['label' => 'Arbeitsort']);
    echo $this->Form->control('start',['type' => 'date','label' => 'Beginn']);
    echo $this->Form->button(__('Job aktualisieren'));
    echo $this->Form->end();
?>
    <?= $this->Form->postLink(
        'Job löschen',
        ['action' => 'delete', $job->id],
        ['confirm' => 'Sind Sie sicher, dass Sie den Job löschen wollen ?'])
    ?>

