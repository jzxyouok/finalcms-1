<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/24
 * Time: 20:09
 */
namespace backend\models;

use yii\base\Model;

class AdminUpdateForm extends Model
{
    public $username;
    public $password;
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
            ['username', 'string', 'min' => 5, 'max' => 20],

            ['realname', 'string', 'min' => 2, 'max' => 20],

            ['email', 'email'],

            ['mobile', 'safe'],

            ['password', 'string', 'min' => 5, 'max' => 20],
        ];
    }

    /**
     * Signs admin up.
     *
     * @return Admin|null the saved model or null if saving fails
     */
    public function update(Admin $admin)
    {
        if ($this->validate()) {
            $admin->username = $this->username;
            $admin->email = $this->email;
            $admin->mobile = $this->mobile;
            $admin->realname = $this->realname;
            if ($this->password) {
                $admin->setPassword($this->password);
            }
            $admin->save();
            return $admin;
        }
        return null;
    }

}