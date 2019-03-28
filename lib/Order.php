<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace Retargeting;

use Retargeting\Helpers\EmailHelper;

class Order extends AbstractRetargetingSDK
{
    protected $orderNo;
    protected $lastName = '';
    protected $firstName = '';
    protected $email = '';
    protected $phone = 0;
    protected $state = '';
    protected $city = '';
    protected $address = '';
    protected $discount = '';
    protected $discountCode = '0';
    protected $shipping = '';
    protected $total = 0;

    /**
     * @return mixed
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * @param mixed $orderNo
     */
    public function setOrderNo($orderNo)
    {
        $orderNo = $this->formatIntFloatString($orderNo);

        $this->orderNo = $orderNo;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $lastName = $this->getProperFormattedString($lastName);

        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $firstName = $this->getProperFormattedString($firstName);

        $this->firstName = $firstName;
    }

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
        $email = EmailHelper::sanitize($email, 'email');

        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $phone = $this->getProperFormattedString($phone);

        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $state = $this->getProperFormattedString($state);

        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $city = $this->getProperFormattedString($city);

        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $address = $this->getProperFormattedString($address);

        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $discount = $this->getProperFormattedString($discount);

        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getDiscountCode()
    {
        return $this->discountCode;
    }

    /**
     * @param mixed $discountCode
     */
    public function setDiscountCode($discountCode)
    {
        $discountCode = $this->getProperFormattedString($discountCode);

        $this->discountCode = $discountCode;
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param mixed $shipping
     */
    public function setShipping($shipping)
    {
        $shipping = $this->getProperFormattedString($shipping);

        $this->shipping = $shipping;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->formatIntFloatString($total);

        $this->total = $total;
    }

    /**
     * Prepare order information
     * @return string
     */
    public function prepareOrderInformation()
    {
        return $this->toJSON([
            'order_no'  => $this->getOrderNo(),
            'lastname'  => $this->getLastName(),
            'firstname' => $this->getFirstName(),
            'email'     => $this->getEmail(),
            'phone'     => $this->getPhone(),
            'state'     => $this->getState(),
            'city'      => $this->getCity(),
            'address'   => $this->getAddress(),
            'discount'  => $this->getDiscount(),
            'discount_code' => $this->getDiscountCode(),
            'shipping'  => $this->getShipping(),
            'total'     => $this->getTotal()
        ]);
    }
}