<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assets Model
 *
 * @property \App\Model\Table\ClassificationsTable|\Cake\ORM\Association\BelongsTo $Classifications
 * @property \App\Model\Table\BrandsTable|\Cake\ORM\Association\BelongsTo $Brands
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CleaningsTable|\Cake\ORM\Association\HasMany $Cleanings
 *
 * @method \App\Model\Entity\Asset get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Asset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asset findOrCreate($search, callable $callback = null, $options = [])
 */
class AssetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('assets');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Classifications', [
            'foreignKey' => 'classification_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Cleanings', [
            'foreignKey' => 'asset_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 300)
            ->requirePresence('observation', 'create')
            ->notEmpty('observation');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['classification_id'], 'Classifications'));
        $rules->add($rules->existsIn(['brand_id'], 'Brands'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
