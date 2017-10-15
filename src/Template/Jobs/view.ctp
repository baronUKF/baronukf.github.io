<!-- File: src/Template/Jobs/view.ctp -->

<h1><?= h($job->jobname) ?></h1>
<p><?= h($job->email) ?></p>
<p><small>Created: <?= $job->created->format(DATE_RFC850) ?></small></p>