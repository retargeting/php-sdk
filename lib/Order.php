<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-02-19
 * Time: 08:03
 */

namespace Retargeting;

/**
 * Class Order
 * @package Retargeting
 */
class Order extends AbstractRetargetingSDK
{
    protected $orderNo;
    protected $lastName;
    protected $firstName;
    protected $email;
    protected $phone;
    protected $state;
    protected $city;
    protected $address;
    protected $birthday;
    protected $discountCode;
    protected $discount;
    protected $shipping;
    protected $rebates;
    protected $fees;
    protected $total;
    protected $orderProducts = [];

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
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
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
    public function getRebates()
    {
        return $this->rebates;
    }

    /**
     * @param mixed $rebates
     */
    public function setRebates($rebates)
    {
        $this->rebates = $rebates;
    }

    /**
     * @return mixed
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param mixed $fees
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
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
     * @return array
     */
    public function getOrderProducts(): array
    {
        return $this->orderProducts;
    }

    /**
     * @param array $orderProducts
     */
    public function setOrderProducts(array $orderProducts)
    {
        $this->orderProducts = $orderProducts;
    }

    /**
     * @return string
     */
    public function prepareOrderInformation() {
        return $this->toJSON([
            'order_no' => $this->orderNo,
            'lastname' => $this->lastName,
            'firstname' => $this->firstName,
            'email' => $this->email,
            'phone' => $this->phone,
            'state' => $this->state,
            'city' => $this->city,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'discount_code' => $this->discountCode,
            'discount' => $this->discount,
            'shipping' => $this->shipping,
            'rebates' => $this->rebates,
            'fees' => $this->fees,
            'total' => $this->total,
            'orderProducts' => $this->orderProducts
        ]);
    }
}