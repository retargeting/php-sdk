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
        $email = EmailHelper::validate($email);

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
        $name = $this->getProperFormattedString($name);

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
        $phone = $this->formatIntFloatString($phone);

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
        $city = $this->getProperFormattedString($city);

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
        $sex = is_numeric($sex) ? $sex : (int)$sex;

        $this->sex = $sex;
    }

    /**
     * Prepare email data
     * @return string
     */
    public function prepareEmailData()
    {
        return $this->toJSON([
            'email' => $this->getEmail(),
            'name'  => $this->getName(),
            'phone' => $this->getPhone(),
            'city'  => $this->getCity(),
            'sex'   => $this->getSex()
        ]);
    }
}