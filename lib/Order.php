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
    protected $orderNo = 0;
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
        $this->total = $total;
    }

    /**
     * Prepare order information
     * @return string
     */
    public function prepareOrderInformation()
    {
        $orderNo = $this->formatIntFloatString($this->getOrderNo());
        $lastName = $this->getProperFormattedString($this->getLastName());
        $firstName = $this->getProperFormattedString($this->getFirstName());
        $email = EmailHelper::sanitize($this->getEmail(), 'email');
        $phone = $this->getProperFormattedString($this->getPhone());
        $state = $this->getProperFormattedString($this->getState());
        $city = $this->getProperFormattedString($this->getCity());
        $address = $this->getProperFormattedString($this->getAddress());
        $discount = $this->formatIntFloatString($this->getDiscount());
        $discountCode = $this->formatIntFloatString($this->getDiscountCode());
        $shipping = $this->formatIntFloatString($this->getShipping());
        $total = $this->formatIntFloatString($this->getTotal());

        return $this->toJSON([
            'order_no'  => $orderNo,
            'lastname'  => $lastName,
            'firstname' => $firstName,
            'email'     => $email,
            'phone'     => $phone,
            'state'     => $state,
            'city'      => $city,
            'address'   => $address,
            'discount'  => $discount,
            'discount_code' => $discountCode,
            'shipping'  => $shipping,
            'total'     => $total
        ]);
    }
}