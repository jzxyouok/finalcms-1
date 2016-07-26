<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/26
 * Time: 20:00
 */
namespace common\validators;

use yii\validators\Validator;
use Yii;

class MobileValidator extends Validator
{
    public $pattern = '/^1[34578]\d{9}$/';

    public $skipOnEmpty = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', '����һ����Ч���ֻ�����.');
        }
    }


    protected function validateValue($value)
    {
        $valid = preg_match($this->pattern, $value);

        return $valid ? null : [$this->message, []];
    }

}
