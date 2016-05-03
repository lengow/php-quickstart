<?php
abstract class Zuora_Object
{
    const TYPE_NAMESPACE = 'http://object.api.zuora.com/';

    protected $zType = 'zObject';

    protected $data = array();

    /**
     *
     * @param $name string
     * @param $value mixed
     * @return void
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function &__get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function getSoapVar()
    {
        return new SoapVar(
            (array)$this->data,
            SOAP_ENC_OBJECT,
            $this->zType,
            self::TYPE_NAMESPACE
        );
    }
}
