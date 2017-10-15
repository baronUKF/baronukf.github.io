<?php
// src/Model/Table/JobsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class JobsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always'
                ]
            ]
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('jobname')
            ->requirePresence('jobname')
            ->notEmpty('email')
            ->requirePresence('email')
            ->notEmpty('employer')
            ->requirePresence('employer')
            ->notEmpty('joblocation')
            ->requirePresence('joblocation')
            ->notEmpty('start')
            ->requirePresence('start');

        return $validator;
    }
}

?>