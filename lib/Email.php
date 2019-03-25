<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace Retargeting;

use Retargeting\Helpers\EmailHelper;

class Email extends AbstractRetargetingSDK
{
    protected $email;
    protected $name = '';
    protected $phone = '';
    protected $city = '';
    protected $sex = '';

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * Prepare email data
     * @return string
     */
    public function prepareEmailData()
    {
        $email = EmailHelper::validate($this->getEmail());
        $name = $this->getProperFormattedString($this->getName());
        $phone = $this->formatIntFloatString($this->getPhone());
        $city = $this->getProperFormattedString($this->getCity());

        $sex = is_numeric($this->getSex()) ? $this->getSex() : (int)$this->getSex();

        return $this->toJSON([
            'email' => $email,
            'name'  => $name,
            'phone' => $phone,
            'city'  => $city,
            'sex'   => $sex
        ]);
    }
}