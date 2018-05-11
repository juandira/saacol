<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asset Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date
 * @property int $classification_id
 * @property string $observation
 * @property int $brand_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Cleaning[] $cleanings
 */
class Asset extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'date' => true,
        'classification_id' => true,
        'observation' => true,
        'brand_id' => true,
        'user_id' => true,
        'classification' => true,
        'brand' => true,
        'user' => true,
        'cleanings' => true
    ];
}
