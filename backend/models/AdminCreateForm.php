<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/23
 * Time: 18:21
 */
namespace backend\models;

use yii\base\Model;

class AdminCreateForm extends Model
{
    public $username;
    public $password;
    public $repassword;
    public $realname;
    public $email;
    public $mobile;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '用户名已被占用.'],
            ['username', 'string', 'min' => 5, 'max' => 20],

            ['realname', 'required'],
            ['realname', 'string', 'min' => 2, 'max' => 20],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '邮箱已被占用.'],

            ['mobile', 'required'],
            ['mobile', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '手机已被占用.'],

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

    /**
     * Signs admin up.
     *
     * @return Admin|null the saved model or null if saving fails
     */
    public function register()
    {
        if ($this->validate()) {
            $admin = new Admin();
            $admin->username = $this->username;
            $admin->email = $this->email;
            $admin->mobile = $this->mobile;
            $admin->setPassword($this->password);
            $admin->save();
            return $admin;
        }

        return null;
    }

}