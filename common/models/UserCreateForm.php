<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/26
 * Time: 19:55
 */
namespace common\models;
use yii\base\Model;

class UserCreateForm extends Model
{
    public $account;
    public $password;
    public $repassword;

    private $_account_type;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['account', 'filter', 'filter' => 'trim'],
            ['account', 'required'],
            ['account', 'string', 'min' => 3, 'max' => 20],
            ['account', 'validateAccount'],

            ['password', 'required'],
            ['password', 'string', 'min' => 5, 'max' => 20],

            ['repassword', 'required'],
            ['repassword', 'string', 'min' => 5, 'max' => 20],
            ['repassword', 'validatePassword'],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {

            if ($this->password !== $this->repassword) {
                $this->addError($attribute, '两次密码不一致，请确认');
            }
        }
    }

    public function validateAccount($attribute, $params)
    {
        $mobileValidator = new \common\validators\MobileValidator();
        $valid = $mobileValidator->validate($this->account);
        if ($valid) {
            $this->_account_type = 'phone';
            $user = User::findByMobile($this->account);
            if ($user) {
                $this->addError($attribute, '账号已注册.');
            }
            return;
        }
        $emailValidator = new \yii\validators\EmailValidator();
        $valid = $emailValidator->validate($this->account);
        if ($valid) {
            $this->_account_type = 'email';
            $user = User::findByEmail($this->account);
            if ($user) {
                $this->addError($attribute, '账号已注册.');
            }
            return;
        }
        $this->addError($attribute, '请输入正确的手机号或邮箱地址.');
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            if ($this->_account_type == 'email') {
                $user->email = $this->account;
            } elseif ($this->_account_type == 'phone') {
                $user->mobile = $this->account;
            }
            $user->setPassword($this->password);
            $user->created_at = time();
            $user->updated_at = time();
            $user->save();
            return $user;
        }

        return null;
    }

}