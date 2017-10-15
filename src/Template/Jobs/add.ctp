<!-- File: src/Template/Jobs/add.ctp -->

<h1>Add Job</h1>
<?php
    echo $this->Form->create($job);
    echo $this->Form->control('jobname',['label' => 'Titel des Stellenangebots']);
    echo $this->Form->control('email',['label' => 'E-Mail Adresse']);
    echo $this->Form->control('employer',['label' => 'Arbeitgeber']);
    echo $this->Form->control('joblocation',['label' => 'Arbeitsort']);
    echo $this->Form->control('start',['type' => 'date','label' => 'Beginn']);
    echo $this->Form->button(__('Job speichern'));
    echo $this->Form->end();
?>