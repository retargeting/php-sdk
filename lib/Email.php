<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace Retargeting;

/**
 * Class Email
 * @package Retargeting
 */
class Email extends AbstractRetargetingSDK
{
    protected $email;
    protected $name = null;
    protected $phone = null;
    protected $city = null;
    protected $sex = null;
    protected $birthday = null;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return null
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param null $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return null
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param null $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function prepareEmailInfo() {
        return $this->toJSON([
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
            'city' => $this->city,
            'sex' => $this->sex,
            'birthday' => $this->birthday
        ]);
    }

}